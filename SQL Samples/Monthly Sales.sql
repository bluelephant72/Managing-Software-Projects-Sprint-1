-- Calculates the monthly sales per year/month, including the number of products sold

USE php_srep_ordering;

SELECT
  YEAR(`order`.order_date) AS "Year",
  MONTHNAME(`order`.order_date) AS "Month",
  COUNT(order_detail.product_id) AS "Products Sold",
  CONCAT("$", SUM(order_detail.sale_price)) AS "Total Sales"
FROM `order`
INNER JOIN order_detail
  ON `order`.order_num = order_detail.order_num
GROUP BY YEAR(`order`.order_date), MONTH(`order`.order_date)
ORDER BY YEAR(`order`.order_date) DESC, MONTH(`order`.order_date) DESC;
