SELECT p.name, p.price
FROM products p
         JOIN categories c ON p.category_id = c.id
WHERE p.price >= 100 AND p.price <= 200 AND c.name LIKE '%ama'