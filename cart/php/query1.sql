INSERT INTO liquor (product_name, price, vendor_id, exp_date, etoh_amt, reviews, img) VALUES
('apple', 34.95, '1', '2022-10-31', 40.0, 5, './upload/apple.jpg'),
('mango', 24.95, '2', '2024-09-30', 45.0, 5, './upload/mango.webp'),
('strawberry', 29.95, '3', '2023-06-30', 40.0, 5, './upload/strawberry.png'),
('peach', 42.95, '4', '2025-12-31', 35.0, 5, './upload/peach.png')


-- UPDATE `liquor` SET `exp_date` = '2024-09-30' WHERE `liquor`.`id` = 2;
-- ALTER TABLE liquor
-- ADD COLUMN reviews FLOAT DEFAULT 0 NOT NULL AFTER etoh_amt;