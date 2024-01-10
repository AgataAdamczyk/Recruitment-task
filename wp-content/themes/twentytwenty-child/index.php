<?php
/**
 * The main template file
 *
 * @package WordPress
 * @subpackage TwentyTwentyChild
 */

get_header();
?>
    <main class="main front-page">
        <section class="section-front-page">
            <div class="section-container">
                <h1 class="front-page-header">Recruitment task</h1>
                <div class="recruitment-tasks">
                    <div class="task-item">
                        <h4>Introduction</h4>
                        <p class="task-item-text">
                            A customer asks for some changes to his WordPress website which uses the default TwentyTwenty theme.
                            Please prepare proper file structure and implement all the changes listed below:
                        </p>
                    </div>
                    <div class="task-item">
                        <h4>Task 1</h4>
                        <p class="task-item-text">
                            There are some styling changes required, and there is a high chance that there will be a lot more styling changes needed in the future.
                            Where would you insert your custom CSS rules?
                            <span class="task-item-response">
                                <a href="<?php echo esc_url('https://github.com/AgataAdamczyk/Fooz-task/blob/main/wp-content/themes/twentytwenty-child/functions.php'); ?>" target="_blank">
                                    Github => wp-content/themes/twentytwenty-child/functions.php
                                </a>
                            </span>
                        </p>
                    </div>
                    <div class="task-item">
                        <h4>Task 2</h4>
                        <p class="task-item-text">
                            Load a custom JavaScript located in assets/js/scripts.js
                            (file depends on jQuery and should be loaded in the footer rather than header).
                            <span class="task-item-response">
                                <a href="<?php echo esc_url('https://github.com/AgataAdamczyk/Fooz-task/blob/main/wp-content/themes/twentytwenty-child/functions.php'); ?>" target="_blank">
                                    Github => wp-content/themes/twentytwenty-child/functions.php
                                </a>
                            </span>
                        </p>
                    </div>
                    <div class="task-item">
                        <h4>Task 3</h4>
                        <p class="task-item-text">
                            Write a code which will add custom post type “Books” with taxonomy “Genre”.
                            Custom post type must have slug “library” and translatable labels,
                            Taxonomy must have slug “book-genre” and translatable labels.
                            <span class="task-item-response">
                                <a href="<?php echo esc_url('https://github.com/AgataAdamczyk/Fooz-task/blob/main/wp-content/themes/twentytwenty-child/functions.php'); ?>" target="_blank">
                                    Github => wp-content/themes/twentytwenty-child/functions.php
                                </a>
                            </span>
                        </p>
                    </div>
                    <div class="task-item">
                        <h4>Task 4</h4>
                        <div>
                            <p class="task-item-text">
                                Create custom templates for:
                            </p>
                            <ul>
                                <li>
                                    4.1. Single Book page – displays Book title, image, book genre, date
                                    <span class="task-item-response">
                                        <a href="<?php echo esc_url('https://github.com/AgataAdamczyk/Fooz-task/blob/main/wp-content/themes/twentytwenty-child/single-books.php'); ?>" target="_blank">
                                            Github => wp-content/themes/twentytwenty-child/single-books.php
                                        </a>
                                        and
                                        <a href="<?php echo esc_url(home_url('/library/the-master-and-margarita/')); ?>" target="_blank">
                                            Single Book page
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    4.2. Genre page (taxonomy) – displays list of Books from specific genre
                                    (5 books per page, please implement pagination or simple links to show next/previous page)
                                    <span class="task-item-response">
                                        <a href="<?php echo esc_url('https://github.com/AgataAdamczyk/Fooz-task/blob/main/wp-content/themes/twentytwenty-child/taxonomy-book-genre.php'); ?>" target="_blank">
                                            Github => wp-content/themes/twentytwenty-child/taxonomy-book.php
                                        </a>
                                        and
                                        <a href="<?php echo esc_url(home_url('/book-genre/fantasy/')); ?>" target="_blank">
                                            Genre page (taxonomy)
                                        </a>
                                    </span>
                                </li>
                            </ul>
                        </p>
                    </div>
                    <div class="task-item">
                        <h4>Task 5</h4>
                        <div>
                            <p class="task-item-text">
                                Crate two shortcodes:
                            </p>
                            <ul>
                                <li>
                                    5.1. First one should return the title of most recent book.
                                    <span class="task-item-response">
                                        <a href="<?php echo esc_url('https://github.com/AgataAdamczyk/Fooz-task/blob/main/wp-content/themes/twentytwenty-child/single-books.php'); ?>" target="_blank">
                                            Github => wp-content/themes/twentytwenty-child/single-books.php
                                        </a>
                                        and
                                        <a href="<?php echo esc_url(home_url('/library/the-master-and-margarita/')); ?>#most-recent-book" target="_blank">
                                            Single Book page
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    5.2. Second one will return a list of 5 books from given Genre
                                    (user must be able to specify genre, lets assume its just term ID).
                                    Returned books should be sorted alphabetically.
                                    <span class="task-item-response">
                                        <a href="<?php echo esc_url('https://github.com/AgataAdamczyk/Fooz-task/blob/main/wp-content/themes/twentytwenty-child/single-books.php'); ?>" target="_blank">
                                            Github => wp-content/themes/twentytwenty-child/single-books.php
                                        </a>
                                        and
                                        <a href="<?php echo esc_url(home_url('/library/the-master-and-margarita/')); ?>#genre-list" target="_blank">
                                            Single Book page (green background)
                                        </a>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="task-item">
                        <h4>Task 6 - bonus</h4>
                        <p class="task-item-text">
                            Create an AJAX callback returning 20 books in JSON format.
                            JSON should only contain following fields: name, date, genre, excerpt.
                            You can use scripts.js file created previously in Task 2 to make an AJAX call.
                            <span class="task-item-response">
                                <a href="<?php echo esc_url('https://github.com/AgataAdamczyk/Fooz-task/blob/main/wp-content/themes/twentytwenty-child/single-books.php'); ?>" target="_blank">
                                    Github => wp-content/themes/twentytwenty-child/single-books.php
                                </a>
                                and
                                <a href="<?php echo esc_url(home_url('/library/the-master-and-margarita/')); ?>#ajax-list" target="_blank">
                                    Single Book page (orange background)
                                </a>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php
get_footer();
