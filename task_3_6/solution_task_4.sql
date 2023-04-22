SELECT c.name AS category_name, p.name AS product_name, p.price
FROM categories c
         JOIN products p ON c.id = p.category_id
WHERE p.price = (SELECT MAX(price) FROM products)