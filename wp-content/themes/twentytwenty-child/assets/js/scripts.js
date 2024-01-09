// Task 6 - bonus
// Create an AJAX callback returning 20 books in JSON format.
// JSON should only contain following fields: name, date, genre, excerpt.
// You can use scripts.js file created previously in Task 2 to make an AJAX call.

jQuery(document).ready(function ($) {
    $.ajax({
        url: ajax_object.ajax_url,
        type: 'GET',
        dataType: 'json',
        data: {
            action: 'get_books',
        },
        success: function (response) {
            // Display book list
            if (response.length > 0) {
                let bookList = '<ol class="ajax-book-list">';
                $.each(response, function (index, book) {
                    bookList += '<li class="ajax-book-item">';
                    bookList += '<h5>' + book.name + '</h5>';
                    bookList += '<p class="ajax-book-date">Date: ' + book.date + '</p>';
                    bookList += '<p class="ajax-book-genre">Genre: ' + book.genre.join(', ') + '</p>';
                    bookList += '<p class="ajax-book-excerpt">Excerpt: ' + book.excerpt + '</p>';
                    bookList += '</li>';
                });
                bookList += '</ol>';
                $('#your-book-container').html(bookList);
            }
        },
        error: function (error) {
            console.log('Error fetching books data: ', error);
        }
    });
});
