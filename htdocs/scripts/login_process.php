<?php
function sanitise_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

//  if it is not submitted from login
if (!isset($_POST["Login"])) {
	header("location:login.php");
	exit();
}
$err_msg = "";

// userName
if (!isset($_POST["userName"])) {
	header("location:login.php");
	exit();
} else {
	$err_msg = "";
	$userName = $_POST["userName"];
	$userName = sanitise_input($userName);
	if ($userName == "") {
		$err_msg .= "<p>Please enter userName.</p>";
	} else if (!preg_match("/^[a-zA-Z]{2,20}$/", $userName)) {
		$err_msg .= "<p>User Name can only contain max 20 alpha characters.</p>";
	}
}

// Password 	
if (!isset($_POST["password"])) {
	header("location:login.php");
	exit();
} else {
	$password = $_POST["password"];
	$password = sanitise_input($password);
	if ($password == "") {
		$err_msg .= "<p>Please enter password.</p>";
	} else if (!preg_match("/^[a-zA-Z]{2,20}$/", $password)) {
		$err_msg .= "<p>password should be max 20 characters.</p>";
	}
}


//record messages during database operations
$db_msg = "";
require_once "settings.php";
$conn = mysqli_connect($host, $user, $pwd, $sql_db);


if ($conn) {
	// create table if not exists
	$query = "CREATE TABLE IF NOT EXISTS users (
					users_id INT AUTO_INCREMENT PRIMARY KEY, 
					userName VARCHAR(25),
					password VARCHAR(25));";

	$result = mysqli_query($conn, $query);
	// create table successfull	
	if ($result) {
		$query = "INSERT INTO users (userName, password) 
	VALUES ('$userName','$password');";
		$insert_result = mysqli_query($conn, $query);

		if ($insert_result) {
			//   insert successfully 
			$db_msg = "<p>User's info  inserted into the database.</p>"
				. "<table id='salesViewTable'><tr><th>Item</th><th>Value</th></tr>"
				. "<tr><th>user ID</th><td>" . mysqli_insert_id($conn) . "</td></tr>"
				. "<tr><th>Username</th><td>$userName</td></tr>"
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
