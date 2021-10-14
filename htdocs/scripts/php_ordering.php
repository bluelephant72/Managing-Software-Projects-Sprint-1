<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Order Submitted">
	<meta name="keywords" content="PHP, Order Submitted">
	<meta name="author" content="Leonard,Anis, Jono, Eamonn">
	<title>display sales</title>
	<link href="../styles/style_order_submission.css" rel="stylesheet" >
</head>
<body>
<section id="ordering_form">
 
        <img src="../images/img_avatar1.png" id="Avatar" alt="Avatar" class="avatar">

	<h2>Order Submitted</h2>
  
    <form method="get" action="../add_sales/add_sales.php"> <button id="addSalesNavi" type="submit">Add Another Order</button></form>
    <br>
    <form method="get" action="home.php"> <button id="returnHomeNavi" type="submit">Return Home</button>
    <br>
    <form><button formaction="../login.php" id="logoutButton" type="submit">Log Out</button></form>

</section>



</body>


<?php
session_start();
?>


<?php
function sanitise_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}





$customerID = $_SESSION["customerID"];
$orderDate = $_SESSION["orderDate"];
$employeeID = $_SESSION["employeeID"];

//record messages during database operations
$db_msg = "";
require_once "settings.php";
$conn = mysqli_connect($host, $user, $pwd, $sql_db);

if ($conn) {

	// create table if not exists

	// $result = mysqli_query($conn, $query);
	// create table successfull	

	// if ($result) {
		// Create order record
		$query = "INSERT INTO `order` (order_date, cust_id, emp_id)
		VALUES ('$orderDate', '$customerID', '$employeeID');";
	
	
		$order_created = mysqli_query($conn, $query);
		

		if ($order_created) {
			echo "Order created";
	
			$order_num = mysqli_insert_id($conn);
				

			//loop per product

			$i = 1;
			while(isset($_POST["productID".$i]) && isset($_POST["quantity".$i])){

				// productID
				$productID = $_POST["productID".$i];
				$productID = sanitise_input($productID);


				// quantity

				$quantity = $_POST["quantity".$i];
				$quantity = sanitise_input($quantity);

				
				$query = "INSERT INTO `order_detail` (order_num, product_id, quantity, sale_price)
				VALUES ('$order_num', '$productID', '$quantity', 0);";
		
			
				$insert_result = mysqli_query($conn, $query);
				$i = $i+1;
			}
		//end loop

	} 
	else {

		$db_msg = "<p>Create table operation unsuccessful.</p>";
	}
	mysqli_close($conn);					// Close the database connect
} else {
	$db_msg = "<p>Unable to connect to the database.</p>";
}
