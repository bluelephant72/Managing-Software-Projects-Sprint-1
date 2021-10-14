USE php_srep_ordering;

-- Copy below to use in PHP, remember to replace the double quotes with single quotes

SELECT
  `order`.order_num as "Order Number",
  `order`.order_date as "Date",
  CONCAT(employee.first_name, " ", employee.last_name) AS "Staff Member",
  CONCAT(customer.first_name, " ", customer.last_name) AS "Customer",
  customer.phone AS "Customer Phone",
  GROUP_CONCAT(product.name SEPARATOR "\n") AS "Item",
  GROUP_CONCAT(product.description SEPARATOR "\n") AS "Description",
  GROUP_CONCAT(CONCAT("$", product.price) SEPARATOR "\n") AS "Item Price",
  GROUP_CONCAT(product_category.name SEPARATOR "\n") AS "Category",
  GROUP_CONCAT(order_detail.quantity SEPARATOR "\n") AS "Quantity",
  GROUP_CONCAT(CONCAT("$", order_detail.sale_price) SEPARATOR "\n") AS "Sale Price",
  CONCAT("$", SUM(order_detail.sale_price)) AS "Total"
FROM `order`
LEFT JOIN customer
  ON `order`.cust_id = customer.cust_id
LEFT JOIN employee
	ON `order`.emp_id = employee.emp_id
LEFT JOIN order_detail
	ON `order`.order_num = order_detail.order_num
LEFT JOIN product
	ON order_detail.product_id = product.product_id
LEFT JOIN product_category
	ON product.category_id = product_category.category_id
-- Line below is optional, can be used to restrict to a specific month
-- WHERE `order`.order_date >= '2021-09-01' AND `order`.order_date < '2021-09-01' + INTERVAL 1 MONTH
GROUP BY `order`.`order_num`
ORDER BY `order`.`order_date` DESC
