<!-- Manager page -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Display">
	<meta name="keywords" content="PHP, Display page">
	<meta name="author" content="Leonard,Anis, Jono, Eamonn">
	<title>display sales</title>
	<link href="../styles/styles_view_sales.css" rel="stylesheet" >
</head>
<body>
<?php
	$page="displaySales_page";  
?>

	<h2>Display Sales Page</h2>
<?php

/* Search bar php code ro look for a specific data

if (!isset($_POST["ci"]))
else {
$ci=trim($_POST["ci"]);
$query="SELECT * FROM addSale WHERE customer_id LIKE '%$ci%'";
}
*/

$query = "SELECT * FROM addSale;";

	require_once "../scripts/settings.php";	// Load MySQL log in credentials
	$conn = mysqli_connect ($host,$user,$pwd,$sql_db);	// Log in and use database
	if ($conn) { // connected
 
		$result = mysqli_query ($conn, $query);		
		if ($result) {	//   query was successfully executed
			
			$record = mysqli_fetch_assoc ($result);
			if ($record) {		//   record exist
				echo "<table id='salesViewTable'>";
				echo "<tr><th>order_id</th><th>customer_id</th><th>product_id</th><th>quantity</th><th>dateTime</th><th>employee_id</th></tr>";
				while ($record) {
					echo "<tr><td>{$record['order_id']}</td>";
					echo "<td>{$record['customer_id']}</td>";
					echo "<td>{$record['product_id']}</td>";
					echo "<td>{$record['quantity']}</td>";
					echo "<td>{$record['orderDate']}</td>";
					echo "<td>{$record['employee_id']}</td>";
					$record = mysqli_fetch_assoc($result);
				}
				echo "</table>";
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
?>	

<form  method="post" action="../scripts/deleteRecord.php">
      <label for="deletion_selection"><b>Enter the Order ID for the Order You Want To Delete</b></label>
      <input type="number" placeholder="Enter Order ID" name="deletion_selection" required>
      <br>
	  <button id="delete" name="delete" type="submit">Delete Order</button>
      <br>
</form>

<form  method="post" action="../scripts/editRecord.php">
      	<label for="edit_selection"><b>Enter the Order ID for the Order You Want To Edit</b></label>
		<input type="number" placeholder="Enter Order ID" name="edit_selection" required>
		<br>
		<label for="edit_selection"><b>Enter the Value You Want To Edit</b></label>
		<select name="edit_value_selection" id="edit_value_selection" required>
			<option value="customer_id">customer_id</option>
			<option value="product_id">product_id</option>
			<option value="quantity">quantity</option>
			<option value="dateTime">dateTime</option>
			<option value="employee_id">employee_id</option>
		</select>
		<br>
		<label for="edit_value"><b>Enter the New Value (REMEMBER IF EDITING dateTime TO ENTER CORRECTLY) </b></label>
		<input type="text" placeholder="Enter Value" name="edit_value" required>
		<br>
	<button id="edit" name="edit" type="submit">Edit Order</button>
    <br>
</form>

<form><button formaction="../login.php" id="logoutButton" type="submit">Log Out</button></form>
    <!-- Search bar form to look for a specific data
	<h2>Search Sales</h2>
	<form action="display.php" method="post" >
		<p><label>customer ID: <input type="text" name="ci" ></label></p>    
		<input type="submit" value="Search" >
	</form>
    -->
</body>
</html>