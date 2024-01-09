<?php
/**
 * Template Name: Genre Page
 *
 * @package YourChildTheme
 */

get_header();
?>
    <main class="main book-genre">
        <section class="section-book-genre-header">
            <header class="book-genre-header">
                <h1 class="page-title">
                    <?php single_term_title(); ?>
                </h1>
            </header>
        </section>

        <!--   Task 4.2. Genre page (taxonomy) – displays list of Books from specific genre
        (5 books per page, please implement pagination or simple links to show next/previous page)   -->
        <section class="section-book-genre">
            <div class="section-container">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                $args = array(
                    'post_type'      => 'books',
                    'posts_per_page' => 5,
                    'paged'          => $paged,
                    'tax_query'      => array(
                        array(
                            'taxonomy' => 'book-genre',
                            'field'    => 'slug',
                            'terms'    => get_query_var('term'),
                        ),
                    ),
                );

                $books_query = new WP_Query($args);

                if ($books_query->have_posts()) : ?>
                    <ul class="book-genre-list">
                        <?php
                        while ($books_query->have_posts()) : $books_query->the_post();
                        ?>
                            <li class="book-genre-list-item">
                                <h4 class="book-genre-item-title"><a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
                            </li>
                        <?php
                        endwhile;
                        ?>
                    </ul>

                <div class="book-genre-pagination">
                    <?php
                    echo paginate_links(array(
                        'total'   => $query->max_num_pages,
                        'current' => max(1, $paged),
                    ));
                    ?>
                </div>

                <?php wp_reset_postdata();
                else :
                    echo '<p>No books found for this genre.</p>';
                endif;
                ?>
            </div>
        </section>
    </main>
<?php
get_footer();
