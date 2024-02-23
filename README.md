# Recruitment task

See => [Recruitment task](http://codelauralian.pl/){:target="_blank" rel="noopener"}

**Introduction**

A customer asks for some changes to his WordPress website which uses the default TwentyTwenty theme. Please prepare proper file structure and implement all the changes listed below:

**Task 1** 

There are some styling changes required, and there is a high chance that there will be a lot more styling changes needed in the future. Where would you insert your custom CSS rules?
- Enqueue custom styles sheet => `wp-content/themes/twentytwenty-child/functions.php`
- custom-styles.css => `wp-content/themes/twentytwenty-child/assets/css/custom-styles.css`

**Task 2**

Load a custom JavaScript located in assets/js/scripts.js (file depends on jQuery and should be loaded in the footer rather than header).
- Enqueue custom JavaScript => `wp-content/themes/twentytwenty-child/functions.php`
- scripts.css => `wp-content/themes/twentytwenty-child/assets/js/scripts.js`

**Task 3**

Write a code which will add custom post type “Books” with taxonomy “Genre”. Custom post type must have slug “library” and translatable labels,
Taxonomy must have slug “book-genre” and translatable labels.
- Add custom post type Book with Genre taxonomy => `wp-content/themes/twentytwenty-child/functions.php`

**Task 4**

Create custom templates for:
4.1. Single Book page – displays Book title, image, book genre, date
  - Single Book page => `wp-content/themes/twentytwenty-child/single-books.php`
4.2. Genre page (taxonomy) – displays list of Books from specific genre (5 books per page, please implement pagination or simple links to show next/previous page)
  - Genre page (taxonomy) => `wp-content/themes/twentytwenty-child/taxonomy-book-genre.php`

**Task 5**

Crate two shortcodes:
5.1. First one should return the title of most recent book.
5.2. Second one will return a list of 5 books from given Genre (user must be able to specify genre, lets assume its just term ID). Returned books should be sorted alphabetically.
  - Both shortcodes => `wp-content/themes/twentytwenty-child/functions.php`
    
**Task 6 - bonus**

Create an AJAX callback returning 20 books in JSON format. JSON should only contain following fields: name, date, genre, excerpt. You can use scripts.js file created previously in Task 2 to make an AJAX call.
  - AJAX callback => `wp-content/themes/twentytwenty-child/functions.php`
