<!--logIn page-->
<!DOCTYPE html>
<html lang="en">
	<!--Head meta-->
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Add a Sale" />
  <meta name="keywords" content="HTML, Form, tags, addsales" />
  <meta name="author" content="Anis, Eamonn, Jonno, Leonard" />
  <link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>
<?php
	$page="add_sales";  
?>
<title>Add Sales</title>

<div class="imgcontainer">
    <img src="../images/img_avatar1.png" alt="Avatar" class="avatar">
</div>
<body>

    <div id="AddTitle">
      <h1>People Health Pharmacy</h1>
      <h2>Add a Sale</h2>
    </div>
      <form  method="post" action="../scripts/php_ordering.php">
      <label for="customerID"><b>Customer ID</b></label>
      <input type="number" placeholder="Enter Customer ID" name="customerID" required>
      <br>
      <label for="productID"><b>Product ID</b></label>
      <input type="number" placeholder="Enter Product ID" name="productID" required>
      <br>
      <label for="quantity"><b>Quantity</b></label>
      <input type="number" placeholder="Enter Quantity" name="quantity" required>
      <br>
      <label for="orderDate"><b>Order Date</b></label>
      <input type="datetime-local" placeholder="" name="orderDate">
      <br>
      <label for="employeeID"><b>Employee ID</b></label>
      <input type="number" placeholder="Enter Employee ID" name="employeeID" required>
      <br>
      <button id="addSale" name="addSale" type="submit">Add Sale</button>
      <br>
    </form>



  <div>
    <form><button formaction="../login.php" id="logoutButton" type="submit">Log Out</button></form>
  </div>
</body>
