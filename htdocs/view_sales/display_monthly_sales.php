<!-- Display page -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Display">
	<meta name="keywords" content="PHP, Display page">
	<meta name="author" content="Leonard, Anis, Jono, Eamonn">
	<title>display sales</title>
	<link href="../styles/styles_view_sales.css" rel="stylesheet" >

	<link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<?php
	$page="displaySales_page";
?>
<section id="main_section">
<form><button formaction="../login.php" id="logoutButton" type="submit">Log Out</button></form>
	<h2>Sale History</h2>

	<form method='post' action='../scripts/download.php'>
  <button type='submit' value='Export' name='Export'><i class="fa fa-download"></i> Export All Sales</button>
	</form>

	<form method='post' action='../scripts/download_monthly.php'>
  <button type='submit' value='Export_monthly' name='Export_monthly'><i class="fa fa-download"></i> Export Monthly Sales Summary</button>
	</form>

<?php


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

	require_once "../scripts/settings.php";	// Load MySQL log in credentials
	$conn = mysqli_connect ($host,$user,$pwd,$sql_db);	// Log in and use database
	if ($conn) { // connected
		$result = mysqli_query ($conn, $query);
		//Array of  data
		$user_arr = array();
		while($row = mysqli_fetch_array($result)){
		 $order_number = $row['Order Number'];
		 $date = $row['Date'];
		 $employee = $row['Staff Member'];
		 $customer_name = $row['Customer'];
		 $customer_phone = $row['Customer Phone'];
		 $item = $row['Item'];
		 $description = $row['Description'];
		 $item_price = $row['Item Price'];
		 $category = $row['Category'];
		 $quantity = $row['Quantity'];
		 $sale_price = $row['Sale Price'];
		 $total = $row['Total'];
		 $user_arr[] = array($order_number,$date,$employee,$customer_name,$customer_phone,$item,$description,$item_price,$category,$quantity,$sale_price,$total);
		}
		$result = mysqli_query ($conn, $query);
		if ($result) {	//   query was successfully executed

			$record = mysqli_fetch_assoc ($result);
			if ($record) {		//   record exist
				echo "<div id='table_container'>";
				echo "<table id='salesViewTable'>";
				echo "<tr><th>Order Number</th><th>Date</th><th>Staff Member</th><th>Customer</th><th>Customer Phone</th><th>Item</th><th>Description</th><th>Item Price</th><th>Category</th><th>Quantity</th><th>Sale Price</th><th>Total</th></tr>";
				while ($record) {
					echo "<tr><td>{$record['Order Number']}</td>";
					echo "<td>{$record['Date']}</td>";
					echo "<td>{$record['Staff Member']}</td>";
					echo "<td>{$record['Customer']}</td>";
					echo "<td>{$record['Customer Phone']}</td>";
					echo "<td>{$record['Item']}</td>";
					echo "<td>{$record['Description']}</td>";
					echo "<td>{$record['Item Price']}</td>";
					echo "<td>{$record['Category']}</td>";
					echo "<td>{$record['Quantity']}</td>";
					echo "<td>{$record['Sale Price']}</td>";
					echo "<td>{$record['Total']}</td>";
					$record = mysqli_fetch_assoc($result);
				}
				echo "</table>";
				echo "</div>";
				mysqli_free_result ($result);	// Free resources
			} else {
				echo "<p>No record retrieved.</p>";
			}
		} else {
			echo "<p>Sales Table doesn't exist or select operation unsuccessful.</p>";
		}
		mysqli_close ($conn);	// Close the database connection
	} else {
		echo "<p>Unable to connect to the database.</p>";
	}
	$serialize_user_arr = base64_encode(serialize($user_arr));
	?>
   <textarea name='export_data' style='display: none;'><?php echo $serialize_user_arr; ?></textarea>
  </form>

  <form id="delete" method="post" action="../scripts/deleteRecord.php">
<h3>Delete Record</h3>

      <label for="deletion_selection"><b>Enter the order_id for the order you want to delete</b></label><br>
      <input type="number" placeholder="Enter Order ID" name="deletion_selection" required>
      <br>
	  <button name="delete" type="submit"><i class="fa fa-trash"></i> Delete Order</button>
      <br>
</form>

<form id="editCust_Emp" method="post" action="../scripts/editCustEmpRecord.php">

<h3>Edit Customer or Employee Record</h3>

      	<label for="edit_selection"><b>Enter the order_id for the order you want to edit</b></label><br>
		<input type="number" placeholder="Enter Order ID" name="edit_selection" required>
		<br>
		<label for="edit_value_selection"><b>Enter the value you want to edit</b></label><br>
		<select name="edit_value_selection" id="edit_value_selection" required>
			<option value="cust_id" selected="selected">cust_id</option>
			<option value="emp_id">emp_id</option>
		</select>
		<br>
		<label for="edit_value"><b>Enter the new value </b></label><br>
		<input type="text" placeholder="Enter Value" name="edit_value" >
		<br>

	<button  name="edit" type="submit"><i class="fa fa-edit"></i> Edit Order</button>
    <br>
</form>

<form id="editOrderDet" method="post" action="../scripts/editProdDet.php">

<h3>Edit Product Details Record</h3>

      	<label for="edit_selection"><b>Enter the order_id for the order you want to edit</b></label><br>
		<input type="number" placeholder="Enter Order ID" name="edit_selection" required>
		<br>
		<label for="edit_value_selection"><b>Enter the value you want to edit</b></label><br>
		<select name="edit_value_selection" id="edit_value_selection" required>
			<option value="product_id" selected="selected">product_id</option>
			<option value="quantity">quantity</option>
		</select>
		<br>

		<label for="product_id"><b>Enter the product_id of the product you want to edit </b></label><br>
		<input type="number" placeholder="Enter Value" name="product_id" ><br>

		<label for="edit_value"><b>Enter the new value </b></label><br>
		<input type="number" placeholder="Enter Value" name="edit_value" >
		<br>

	<button  name="edit" type="submit"><i class="fa fa-edit"></i> Edit Order</button>
    <br>
</form>

<form id="editDate" method="post" action="../scripts/editDateRecord.php">

<h3>Edit Date Record</h3>

	<label for="edit_selection"><b>Enter the order_id of the order you want to edit the date for</b></label><br>
	<input type="number" placeholder="Enter Order ID" name="edit_selection" required>
	<br>
	<label for="edit_date_value"><b>Enter new dateTime</b></label><br>
	<input type="datetime-local" placeholder="" name="edit_date_value">
	<br>
	<button name="editDate" type="submit"> <i class="fa fa-edit"></i> Edit Order Date</button>
    <br>
</form>

<form><button formaction="../scripts/home.php" id="backButton" type="submit">Back</button></form>

</section>
</body>
</html>
