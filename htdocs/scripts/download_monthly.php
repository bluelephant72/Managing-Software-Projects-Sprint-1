<?php

$filename = 'Sales by Month.csv';

// Connect to the database
require_once "../scripts/settings.php";	// Load MySQL log in credentials
$conn = mysqli_connect ($host,$user,$pwd,$sql_db);

$query = "SELECT
  YEAR(`order`.order_date) AS 'Year',
  MONTHNAME(`order`.order_date) AS 'Month',
  COUNT(order_detail.product_id) AS 'Products Sold',
  CONCAT('$', SUM(order_detail.sale_price)) AS 'Total Sales'
FROM `order`
INNER JOIN order_detail
  ON `order`.order_num = order_detail.order_num
GROUP BY YEAR(`order`.order_date), MONTH(`order`.order_date)
ORDER BY YEAR(`order`.order_date) DESC, MONTH(`order`.order_date) DESC;
";

$export_data = mysqli_query ($conn, $query);

// file creation
$file = fopen($filename,"w");
		//Array of fields
		$fields = array('Year', 'Month', 'Products Sold', 'Total Sales');
        fputcsv($file,$fields);

foreach ($export_data as $line){
	// To display on the page a <br /> is used, for exporting to csv this is replaced with a standard newline
 fputcsv($file,str_replace('<br />', "\n", $line));
}

fclose($file);

// download
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=".$filename);
header("Content-Type: application/csv; ");

readfile($filename);

// deleting file
unlink($filename);
exit();



//Export CSV files: https://makitweb.com/how-to-export-mysql-table-data-as-csv-file-in-php/#config
