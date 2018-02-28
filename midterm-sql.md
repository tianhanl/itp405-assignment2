``` sql
SELECT customer_reviews.headline, customer_reviews.review, books.title, author.last_name, publishers.publisher_name
FROM customer_reviews
INNER JOIN books
ON books.id = customer_reviews.book_id
INNER JOIN authors
ON authors.id = books.author_id
INNER JOIN publishers
ON publishers.id = books.publisher_id
```