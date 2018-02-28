``` sql
SELECT customer_reviews.headline, customer_reviews.review, books.title, author.last_name, publishers.publisher_name
FROM customer_reviews
JOIN books
ON books.id = customer_reviews.book_id
JOIN authors
ON authors.id = books.author_id
JOIN publishers
ON publishers.id = books.publisher_id
```