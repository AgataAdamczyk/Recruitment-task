<?php
/**
 * Template Name: Single Book
 *
 * @package WordPress
 * @subpackage TwentyTwentyChild
 */

get_header();
?>
    <main class="main single-book">
        <div class="back-btn">
            <a href="<?php echo esc_url(home_url()); ?>"><= RECRUITMENT TASK</a>
        </div>
        <!--   Task 5.1. - Crate two shortcodes:
        First one should return the title of most recent book.   -->
        <section id="most-recent-book" class="section-most-recent-book">
            <div class="section-container">
                <div class="most-recent-book">
                    <?php
                    echo '<h3 class="most-recent-book-title">';
                    echo __('Look at most recent book: ', 'twentytwentychild');
                    echo do_shortcode('[recent_book_title]');
                    echo '</h3>';
                    ?>
                </div>
            </div>
        </section>

        <!--   Task 4.1. Single Book page – displays Book title, image, book genre, date   -->
        <section class="section-single-book">
            <div class="section-container">
                <?php
                while (have_posts()) : the_post();
                ?>
                    <div class="hero-single-book">
                        <div class="content-wrapper">
                            <header class="single-book-header">
                                <?php the_title('<h1 class="single-book-title">', '</h1>');

                                $book_genres = get_the_terms(get_the_ID(), 'book-genre');
                                if ($book_genres && !is_wp_error($book_genres)) {
                                    $genre_links = array();
                                    foreach ($book_genres as $genre) {
                                        $genre_links[] = '<a href="' . esc_url(get_term_link($genre)) . '">' . esc_html($genre->name) . '</a>';
                                    }
                                    echo '<div class="single-book-genre">';
                                    echo '<span class="genre">' . __('Genre: ', 'twentytwentychild') . '</span>';
                                    echo implode(', ', $genre_links);
                                    echo '</div>';
                                }
                                ?>

                                <div class="single-book-date">
                                    <span class="date">
                                        <?php
                                        echo __('Date: ', 'twentytwentychild');
                                        echo get_the_date();
                                        ?>
                                    </span>
                                </div>
                            </header>
                        </div>
                        <div class="thumbnail-wrapper">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('large');
                            }
                            ?>
                        </div>
                    </div>
                <?php
                endwhile;
                ?>
            </div>
        </section>

        <!--   Task 5.2. - Crate two shortcodes:
        Second one will return a list of 5 books from given Genre
        (user must be able to specify genre, lets assume its just term ID).
        Returned books should be sorted alphabetically.   -->
        <section id="genre-list" class="section-genre-list">
            <div class="section-container">
                <h4 class="genre-list-header">
                    <?php echo __('List of 5 books from fantasy genre:', 'twentytwentychild'); ?>
                </h4>
                <?php echo do_shortcode('[book_list_by_genre genre_id="3"]'); ?>
            </div>
        </section>

        <!--   Task 6 - Create an AJAX callback returning 20 books in JSON format.
        JSON should only contain following fields: name, date, genre, excerpt.
        You can use scripts.js file created previously in Task 2 to make an AJAX call.   -->
        <section id="ajax-list" class="section-ajax-list">
            <div class="section-container">
                <h4 class="ajax-list-header">
                    <?php echo __('20 books in JSON format (AJAX callback):', 'twentytwentychild'); ?>
                </h4>
                <div id="your-book-container"></div>
            </div>
        </section>
    </main>
<?php
get_footer();
?>
