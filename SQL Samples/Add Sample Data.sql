-- This script will add some sample data into the database after it has been created

USE php_srep_ordering;

INSERT INTO employee (first_name, last_name, address, phone)
VALUES ('Jeff', 'Smith', '28 Bourke St, Melbourne, Victoria, Australia', '0412 345 678');

INSERT INTO customer (first_name, last_name, address, phone)
VALUES ('Alice', 'Bloggs', '35 Key Way, Adelaide, South Australia, Australia', '0432 748 203');

INSERT INTO `order` (order_date, cust_id, emp_id)
VALUES ('2021-09-20 17:24:35', 1, 1);

INSERT INTO product_category (description)
VALUES ('Drinks offered from the refrigerator');

INSERT INTO product (name, description, price, stock_count, category_id)
VALUES ('Water', '200ml Cool Springs Mount Dandenong Bottled Water', 3.50, 18, 1);

INSERT INTO product (name, description, price, stock_count, category_id)
VALUES ('Lemonade', '350ml Home Brand Lemon Flavoured Soft Drink', 4.00, 4, 1);

INSERT INTO order_detail (order_num, product_id, quantity, sale_price)
VALUES (1, 1, 2, 6.00);

INSERT INTO order_detail (order_num, product_id, quantity, sale_price)
VALUES (1, 2, 1, 4.00);
