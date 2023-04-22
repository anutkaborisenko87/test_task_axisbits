SELECT attributes.name, COUNT(*) as count
FROM attribute_values
    JOIN products ON attribute_values.product_id = products.id
    JOIN attributes ON attribute_values.attribute_id = attributes.id
GROUP BY attributes.name
ORDER BY count DESC;