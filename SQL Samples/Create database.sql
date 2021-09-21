/* This script will create the database used for the ordering system
Note that running this will delete all data in the database!
To run from phpMyAdmin, choose the "SQL" tab at the top */

-- Create the database if it doesn't exist
DROP DATABASE IF EXISTS php_srep_ordering;
CREATE DATABASE php_srep_ordering;
USE php_srep_ordering;

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

CREATE TABLE `order` (
  order_num int AUTO_INCREMENT,
  order_date datetime,
  cust_id int,
  emp_id int,
  PRIMARY KEY (order_num),
  FOREIGN KEY (cust_id) REFERENCES customer(cust_id),
  FOREIGN KEY (emp_id) REFERENCES employee(emp_id)
);

CREATE TABLE product_category (
  category_id int AUTO_INCREMENT,
  name varchar(255),
  description varchar(8192),
  PRIMARY KEY (category_id)
);

CREATE TABLE product (
  product_id int AUTO_INCREMENT,
  name varchar(255),
  description varchar(8192),
  price decimal(12,2),
  stock_count int,
  category_id int,
  PRIMARY KEY (product_id),
  FOREIGN KEY (category_id) REFERENCES product_category(category_id)
);

CREATE TABLE order_detail (
  order_num int,
  product_id int,
  quantity int,
  sale_price decimal(12,2),
  PRIMARY KEY (order_num, product_id),
  FOREIGN KEY (order_num) REFERENCES `order`(order_num),
  FOREIGN KEY (product_id) REFERENCES product(product_id)
);
