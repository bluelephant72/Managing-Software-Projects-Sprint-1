<!--add_sales page-->
<!DOCTYPE html>
<html lang="en">
	<!--Head meta-->
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Add a Sale" />
  <meta name="keywords" content="HTML, Form, tags,payment" />
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
    <div>
      <h1>People Health Pharmacy</h1>
      <h2>Add a Sale</h2>
    </div>

    <form method="post" action="php_ordering.php">
      <label for="customerID"><b>Customer ID</b></label>
      <input id="customerID"  type="number" placeholder="Enter Customer ID" name="customerID" required>
      <br>
      <label for="productID"><b>Product ID</b></label>
      <input id="productID" type="number" placeholder="Enter Product ID" name="productID" required>
      <br>
      <label for="quantity"><b>Quantity</b></label>
      <input id="quantity" type="number" placeholder="Enter Quantity" name="quantity" required>
      <br>
      <label for="orderDate"><b>Order Date</b></label>
      <input  id="orderDate" type="datetime-local" placeholder="Enter Order Date" name="orderDate" required>
      <br>
      <label for="employeeID"><b>Employee ID</b></label>
      <input id="employeeID"type="number" placeholder="Enter Employee ID" name="employeeID" required>
      <br>
      <button id="addSale" name ="addSale" type="submit">Add Sale</button>
      <br>
    </form>

  <div>
      <form method="get" name ="logoutButton" action="../index.html"><button id="logoutButton" type="submit">Log Out</button></form>
  </div>
</body>