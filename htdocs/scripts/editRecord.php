<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Order Edit">
	<meta name="keywords" content="PHP, Order Edit">
	<meta name="author" content="Leonard,Anis, Jono, Eamonn">
	<title>Edit sales</title>
	<link href="../styles/style.css" rel="stylesheet" >
</head>

<body>
	<h2>Order Edited</h2>

    <form method="get" action="../view_sales/display.php"> <button id="viewReportsNavi" type="submit">View Orders</button></form>
    <br>
    <form method="get" action="home.php"> <button id="returnHomeNavi" type="submit">Return Home</button>
    <br>
    <form><button formaction="../login.php" id="logoutButton" type="submit">Log Out</button></form>


</body>

<?php
// if (!isset($_POST["edit_value"])) {
//     header("location:../view_sales/display.php");
//     exit();
// } else {
//     $edit_value = $_POST["edit_value"];
//     $edit_value = sanitise_input($edit_value);
//     if ($edit_value == "") {
//         $err_msg .= "<p>Please enter value.</p>";
//     }
// }

$db_msg = "";
require_once "settings.php";
$conn = mysqli_connect($host, $user, $pwd, $sql_db);

$order_id=$_POST["edit_selection"];
$edit_value_selection=$_POST["edit_value_selection"];
$edit_value=$_POST["edit_value"];

// will not work till database is built correct
$query = "UPDATE addSale SET $edit_value_selection = $edit_value WHERE order_id=$order_id";

if ($conn->query($query) === TRUE) {
    echo "Record edited successfully";
} else {
    echo "Error editing record: " . $conn->error;
}

mysqli_close($conn);
?>