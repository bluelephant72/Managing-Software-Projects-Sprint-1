<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Order Submitted">
	<meta name="keywords" content="PHP, Order Submitted">
	<meta name="author" content="Leonard,Anis, Jono, Eamonn">
	<title>display sales</title>
	<link href="../styles/style.css" rel="stylesheet" >
</head>
<body>

	<h2>Order Submitted</h2>

    <form method="get" action="../add_sales/add_sales.php"> <button id="addSalesNavi" type="submit">Add Another Order</button></form>
    <br>
    <form method="get" action="home.php"> <button id="returnHomeNavi" type="submit">Return Home</button>
    <br>
    <form><button formaction="../login.php" id="logoutButton" type="submit">Log Out</button></form>


</body>





<?php
function sanitise_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//  if it is not submitted from add_sales, redirect
if (!isset($_POST["addSale"])) {
    header("location:add_sales.php");
    exit();
}
$err_msg = "";

// customerID
if (!isset($_POST["customerID"])) {
    header("location:add_sales.php");
    exit();
} else {
    $err_msg = "";
    $customerID = $_POST["customerID"];
    $customerID = sanitise_input($customerID);
    if ($customerID == "") {
        $err_msg .= "<p>Please enter customerID.</p>";
    }
}

// productID
if (!isset($_POST["productID"])) {
    header("location:add_sales.php");
    exit();
} else {
    $productID = $_POST["productID"];
    $productID = sanitise_input($productID);
    if ($productID == "") {
        $err_msg .= "<p>Please enter productID.</p>";
    }
}

// quantity
if (!isset($_POST["quantity"])) {
    header("location:add_sales.php");
    exit();
} else {
    $quantity = $_POST["quantity"];
    $quantity = sanitise_input($quantity);
    if ($quantity == "") {
        $err_msg .= "<p>Please enter quantity.</p>";
    }
}
// orderDate
if (!isset($_POST["orderDate"])) {
    header("location:add_sales.php");
    exit();
} else {
    $orderDate = $_POST["orderDate"];
    $orderDate = sanitise_input($orderDate);
    if ($orderDate == "") {
        $err_msg .= "<p>Please enter orderDate.</p>";
    }
}
// employeeID
if (!isset($_POST["employeeID"])) {
    header("location:add_sales.php");
    exit();
} else {
    $employeeID = $_POST["employeeID"];
    $employeeID = sanitise_input($employeeID);
    if ($employeeID == "") {
        $err_msg .= "<p>Please enter employeeID.</p>";
    }
}

//record messages during database operations
$db_msg = "";
require_once "settings.php";
$conn = mysqli_connect($host, $user, $pwd, $sql_db);

if ($conn) {
	// create table if not exists
	$query = "CREATE TABLE IF NOT EXISTS addSale (
					order_id  INT PRIMARY KEY AUTO_INCREMENT,
                    customer_id INT, 
					product_id INT,
					quantity INT,
                    orderDate datetime,
                    employee_id INT);";

	$result = mysqli_query($conn, $query);
	// create table successfull	

	if ($result) {
		$query = "INSERT INTO addSale (customer_id, product_id, quantity, orderDate, employee_id) 
	VALUES ('$customerID','$productID','$quantity','$orderDate','$employeeID');";
		$insert_result = mysqli_query($conn, $query);
    

		if ($insert_result) {
            echo"Data inserted Successfully </br>";
 
     
            echo"you will redirect to Home page in 3 seconds ";
 
       
        header('refresh: 3; url=home.php'); 
        exit();

			//   insert successfully 
			$db_msg = "<p>User's info  inserted into the database.</p>"
				. "<table id='salesViewTable'><tr><th>Item</th><th>Value</th></tr>"
				. "<tr><th>user ID</th><td>" . mysqli_insert_id($conn) . "</td></tr>"
				. "<tr><th>Username</th><td>$customerID</td></tr>"
				. "</table>";
		} else {
			$db_msg = "<p>Insert unsuccessful.</p>";
		}
	} else {
		$db_msg = "<p>Create table operation unsuccessful.</p>";
	}
	mysqli_close($conn);					// Close the database connect
} else {
	$db_msg = "<p>Unable to connect to the database.</p>";
}