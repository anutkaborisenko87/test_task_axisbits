CREATE TABLE categories (
                            id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                            name VARCHAR(255) NOT NULL,
                            parent_id INT(11) UNSIGNED DEFAULT NULL,
                            PRIMARY KEY (id),
                            FOREIGN KEY (parent_id) REFERENCES categories(id) ON DELETE CASCADE
);

CREATE TABLE products (
                          id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                          name VARCHAR(255) NOT NULL,
                          price DECIMAL(10, 2) NOT NULL,
                          category_id INT(11) UNSIGNED NOT NULL,
                          PRIMARY KEY (id),
                          FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);

CREATE TABLE attributes (
                            id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                            name VARCHAR(255) NOT NULL,
                            PRIMARY KEY (id)
);

CREATE TABLE attribute_values (
                                  id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                                  product_id INT(11) UNSIGNED NOT NULL,
                                  attribute_id INT(11) UNSIGNED NOT NULL,
                                  value VARCHAR(255) NOT NULL,
                                  PRIMARY KEY (id),
                                  FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
                                  FOREIGN KEY (attribute_id) REFERENCES attributes(id) ON DELETE CASCADE
);