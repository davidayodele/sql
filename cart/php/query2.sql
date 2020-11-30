CREATE TABLE orders
(id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,                             
    price FLOAT,                            
    product_id INT(11) NOT NULL,
    order_date DATE now(),
    email VARCHAR (255) NOT NULL,
    volume INT(11) NOT NULL DEFAULT 0,
    FOREIGN KEY (volume) REFERENCES liquor(etoh_amt),
    FOREIGN KEY (price) REFERENCES liquor(price),
    FOREIGN KEY (product_id) REFERENCES liquor(id),
    FOREIGN KEY (email) REFERENCES customers(email)
);


-- ALTER TABLE orders ADD CONSTRAINT fk_volume FOREIGN KEY (volume) REFERENCES liquor(etoh_amt);