<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Order Deleted">
	<meta name="keywords" content="PHP, Order Deleted">
	<meta name="author" content="Leonard,Anis, Jono, Eamonn">
	<title>delete sales</title>
	<link href="../styles/style.css" rel="stylesheet" >
</head>
<body>
	<h2>Order Deleted</h2>

    <form method="get" action="../view_sales/display.php"> <button id="viewReportsNavi" type="submit">View Orders</button></form>
    <br>
    <form method="get" action="home.php"> <button id="returnHomeNavi" type="submit">Return Home</button>
    <br>
    <form><button formaction="../login.php" id="logoutButton" type="submit">Log Out</button></form>


</body>


<?php
$db_msg = "";
require_once "settings.php";
$conn = mysqli_connect($host, $user, $pwd, $sql_db);

$x=$_POST["deletion_selection"];

// will not work till database is built correct
//$query = "DELETE FROM `order` WHERE order_num=$x";

$query_order_detail =
    "DELETE
    FROM
        `order_detail`
    WHERE
        order_num = $x;";
$query_order =
    "DELETE
    FROM
        `order`
    WHERE
        order_num = $x;";

if ($conn->query($query_order_detail) && $conn->query($query_order)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

mysqli_close($conn);
?>
