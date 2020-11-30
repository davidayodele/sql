CREATE TABLE IF NOT EXISTS $tablename2
(email VARCHAR(255) NOT NULL DEFAULT 'N/A',
    order_id INT(11) NOT NULL FOREIGN KEY REFERENCES order(order_id),
    DOB DATE,
    phone char(50),
    customer_name VARCHAR (255)
);
