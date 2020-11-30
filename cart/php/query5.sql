CREATE TABLE IF NOT EXISTS $tablename5
(id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,                             
    price FLOAT FOREIGN KEY REFERENCES liquor(price),                            
    product_id INT(11) NOT NULL FOREIGN KEY REFERENCES liquor(id),
    order_date DATE,
    email VARCHAR (255) NOT NULL FOREIGN KEY REFERENCES customer(email),
    volume INT(11) NOT NULL DEFAULT 0
);