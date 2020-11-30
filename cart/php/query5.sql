CREATE TABLE IF NOT EXISTS reviewers
(id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR (255) NOT NULL,
    review_id INT(11) NOT NULL DEFAULT 0,
    review_details VARCHAR (255) NOT NULL DEFAULT 'N/A',
    product_name VARCHAR (255) NOT NULL,
    FOREIGN KEY (email) REFERENCES customers(email),
    FOREIGN KEY (product_name) REFERENCES liquor(product_name)
);