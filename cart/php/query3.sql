CREATE TABLE customers
(email VARCHAR(255) NOT NULL DEFAULT 'N/A',
    order_id INT(11) NOT NULL,
    DOB DATE,
    phone char(50),
    customer_name VARCHAR (255),
 	FOREIGN KEY (order_id) REFERENCES orders(order_id)
);
