/*
***** Work in progress *****
*/
-- This script will create the database used for the ordering system

-- First drop tables if they exist. Allows for the script to be rerun
-- Note that running this will delete all data in the database!
DROP TABLE IF EXISTS
  customer,
  employee,
  order,
  order_detail,
  product,
  product_category;

-- Now create the tables
CREATE TABLE customer (
  cust_id int AUTO_INCREMENT,
  first_name varchar(255),
  last_name varchar(255),
  address varchar(255),
  phone varchar(255),
  PRIMARY KEY (cust_id)
);

CREATE TABLE employee (
  emp_id int AUTO_INCREMENT,
  first_name varchar(255),
  last_name varchar(255),
  address varchar(255),
  phone varchar(255),
  PRIMARY KEY (emp_id)
);

CREATE TABLE "order" (
  order_num int AUTO_INCREMENT,
  order_date datetime(),
  cust_id int,
  emp_id int,
  PRIMARY KEY (order_num),
  FOREIGN KEY (cust_id) REFERENCES customer(cust_id),
  FOREIGN KEY (emp_id) REFERENCES employee(emp_id)
);

CREATE TABLE product_category (

);

CREATE TABLE product (
  
);

CREATE TABLE order_detail (
  order_num int,
  product_id int,
  quantity int,
  sale_price decimal(10,2),
  PRIMARY KEY (order_num, product_id),
  FOREIGN KEY (order_num) REFERENCES "order"(order_num),
  FOREIGN KEY (product_id) REFERENCES product(product_id)
);
