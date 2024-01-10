# Recruitment task

This child theme is created to implement various customizations for a WordPress website using the default TwentyTwenty theme.

* Introduction

A customer asks for some changes to his WordPress website which uses the default TwentyTwenty theme. Please prepare proper file structure and implement all the changes listed below:

* Task 1

There are some styling changes required, and there is a high chance that there will be a lot more styling changes needed in the future. Where would you insert your custom CSS rules?

* Task 2

Load a custom JavaScript located in assets/js/scripts.js (file depends on jQuery and should be loaded in the footer rather than header).

* Task 3

Write a code which will add custom post type “Books” with taxonomy “Genre”. Custom post type must have slug “library” and translatable labels,
Taxonomy must have slug “book-genre” and translatable labels.

* Task 4

Create custom templates for:
4.1. Single Book page – displays Book title, image, book genre, date
4.2. Genre page (taxonomy) – displays list of Books from specific genre (5 books per page, please implement pagination or simple links to show next/previous page)

* Task 5

Crate two shortcodes:
5.1. First one should return the title of most recent book.
5.2. Second one will return a list of 5 books from given Genre (user must be able to specify genre, lets assume its just term ID). Returned books should be sorted alphabetically.

* Task 6 - bonus

Create an AJAX callback returning 20 books in JSON format. JSON should only contain following fields: name, date, genre, excerpt. You can use scripts.js file created previously in Task 2 to make an AJAX call.
