<?php
/**
 * Twenty Twenty Child functions and definitions
 *
 * @package WordPress
 * @subpackage TwentyTwentyChild
 */


/**
 *  Task 1 - Add custom CSS rules (enqueue styles)
 */

function twentytwenty_child_enqueue_styles() {
    // Parent theme stylesheet
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

    // Child theme stylesheet
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/assets/css/custom-styles.css', array('parent-style'));
}

// Hook the enqueue function into the wp_enqueue_scripts action
add_action('wp_enqueue_scripts', 'twentytwenty_child_enqueue_styles');

/**
 *  Task 2 - Load a custom JavaScript located in assets/js/scripts.js
 *  (file depends on jQuery and should be loaded in the footer rather than header).
 *  &
 *  Task 6 = AJAX
 */

function twentytwenty_child_enqueue_scripts() {
        // Enqueue scripts.js - true in the last parameter of wp_enqueue_script means the script will be loaded in the footer
        wp_enqueue_script('custom-scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.js', array('jquery'), '1.0', true);

        // Pass the AJAX URL to script.js
        wp_localize_script('custom-scripts', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'twentytwenty_child_enqueue_scripts');

/**
 *  Task 3 - Write a code which will add custom post type “Books” with taxonomy “Genre”.
 *  Custom post type must have slug “library” and translatable labels,
 *  Taxonomy must have slug “book-genre” and translatable labels.
 */

if (!function_exists('cpt_books_init')) {
    function cpt_books_init() {
        $labels = array(
            'name'               => _x('Books', 'Post type general name', 'twentytwentychild'),
            'singular_name'      => _x('Book', 'Post type singular name', 'twentytwentychild'),
            'menu_name'          => _x('Books', 'Admin Menu text', 'twentytwentychild'),
            'name_admin_bar'     => _x('Book', 'Add new on Toolbar', 'twentytwentychild'),
            'add_new'            => __('Add New', 'twentytwentychild'),
            'add_new_item'       => __('Add New Book', 'twentytwentychild'),
            'new_item'           => __('New Book', 'twentytwentychild'),
            'edit_item'          => __('Edit Book', 'twentytwentychild'),
            'view_item'          => __('View Book', 'twentytwentychild'),
            'all_items'          => __('All Books', 'twentytwentychild'),
            'search_items'       => __('Search Books', 'twentytwentychild'),
            'parent_item_colon'  => __('Parent Books:', 'textdomain' ),
            'not_found'          => __('No books found', 'twentytwentychild'),
            'not_found_in_trash' => __('No books found in Trash', 'twentytwentychild'),
//           Various labels for the post type are provided and made translatable using the _x() and __() functions
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array('slug' => 'library'),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'menu_icon'          => 'dashicons-book',
            'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        );

        register_post_type('books', $args);
    }

    if( !function_exists('cpt_books_taxonomies')) {
        function cpt_books_taxonomies(){
            $taxonomy_labels = array(
                'name'                       => _x('Genres', 'taxonomy general name', 'twentytwentychild'),
                'singular_name'              => _x('Genre', 'taxonomy singular name', 'twentytwentychild'),
                'search_items'               => __('Search Genres', 'twentytwentychild'),
                'all_items'                  => __('All Genres', 'twentytwentychild'),
                'parent_item'                => __('Parent Genre', 'twentytwentychild'),
                'parent_item_colon'          => __('Parent Genre:', 'twentytwentychild'),
                'edit_item'                  => __('Edit Genre', 'twentytwentychild'),
                'update_item'                => __('Update Genre', 'twentytwentychild'),
                'add_new_item'               => __('Add New Genre', 'twentytwentychild'),
                'new_item_name'              => __('New Genre Name', 'twentytwentychild'),
                'menu_name'                  => __('Genre', 'twentytwentychild'),
            );

            $taxonomy_args = array(
                'labels'                     => $taxonomy_labels,
                'hierarchical'               => true,
                'public'                     => true,
                'show_ui'                    => true,
                'show_admin_column'          => true,
                'show_in_nav_menus'          => true,
                'show_tagcloud'              => true,
                'rewrite'                    => array('slug' => 'book-genre'),
            );

            register_taxonomy('book-genre', array('books'), $taxonomy_args);
        }
    }
}

add_action('init', 'cpt_books_init');
add_action('init', 'cpt_books_taxonomies');

/**
 * Task 5 - Crate two shortcodes:
 * 5.1. First one should return the title of most recent book.
 */

function recent_book_title_shortcode() {
    $args = array(
        'post_type'      => 'books',
        'posts_per_page' => 1,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        $query->the_post();
        $title = get_the_title();
        wp_reset_postdata();
        return $title;
    }

    return 'No recent books found.';
}

add_shortcode('recent_book_title', 'recent_book_title_shortcode');

/**
 * 5.2. Second one will return a list of 5 books from given Genre (user must be able to specify genre, lets assume its just term ID).
 * Returned books should be sorted alphabetically.
 */

function book_list_by_genre_shortcode($atts) {
    $atts = shortcode_atts(array(
        'genre_id' => 3,
    ), $atts, 'book_list_by_genre');

    $args = array(
        'post_type'      => 'books',
        'posts_per_page' => 5,
        'orderby'        => 'title',
        'order'          => 'ASC',
        'tax_query'      => array(
            array(
                'taxonomy' => 'book-genre',
                'field'    => 'term_id',
                'terms'    => $atts['genre_id'],
            ),
        ),
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        $output = '<ul class="genre-list">';
        while ($query->have_posts()) {
            $query->the_post();
            $output .= '<li class="genre-list-item"><a href="' . esc_url(get_permalink()) . '">' . get_the_title() . '</a></li>';
        }
        $output .= '</ul>';
        wp_reset_postdata();
        return $output;
    }

    return 'No books found for the specified genre.';
}

add_shortcode('book_list_by_genre', 'book_list_by_genre_shortcode');

/**
 * Task 6 - bonus
 *
 * Create an AJAX callback returning 20 books in JSON format. JSON should only contain following fields: name, date, genre, excerpt.
 * You can use scripts.js file created previously in Task 2 to make an AJAX call.
 *
 */



// Custom AJAX endpoint for fetching book data

function get_books_callback() {
    $args = array(
        'post_type'      => 'books',
        'posts_per_page' => 20,
    );

    $books_query = new WP_Query($args);

    $books_data = array();

    if ($books_query->have_posts()) {
        while ($books_query->have_posts()) {
            $books_query->the_post();

            $book_data = array(
                'name'   => get_the_title(),
                'date'   => get_the_date(),
                'genre'  => wp_get_post_terms(get_the_ID(), 'book-genre', array('fields' => 'names')),
                'excerpt' => get_the_excerpt(),
            );

            $books_data[] = $book_data;
        }
    }

    wp_reset_postdata();

    // Return the JSON response
    wp_send_json($books_data);

    // Always exit to prevent further execution
    exit;
}

add_action('wp_ajax_get_books', 'get_books_callback');
add_action('wp_ajax_nopriv_get_books', 'get_books_callback');
