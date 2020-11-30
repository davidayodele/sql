INSERT INTO Liquor (product_name, price, vendor_id, exp_date, etoh_amt, img) VALUES
('apple', 34.95, '1', '2022-10-31', 40.0, './upload/apple.jpg'),
('mango', 24.95, '2', '2024-09-30', 45.0, './upload/mango.webp'),
('strawberry', 29.95, '3', '2023-06-30', 40.0, './upload/strawberry.png'),
('peach', 42.95, '4', '2025-12-31', 35.0, './upload/peach.png')

-- UPDATE `liquor` SET `exp_date` = '2024-09-30' WHERE `liquor`.`id` = 2;