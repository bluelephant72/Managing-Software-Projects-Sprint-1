<!--logIn page-->
<!DOCTYPE html>
<html lang="en">
	<!--Head meta-->
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Add a Sale" />
  <meta name="keywords" content="HTML, Form, tags, addsales" />
  <meta name="author" content="Anis, Eamonn, Jonno, Leonard" />
  <link rel="stylesheet" type="text/css" href="../styles/styles_add_sales.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">



</head>
<?php
	$page="add_sales";
?>
<title>Add Sales</title>

<body>
<section id="add_sales_form">
<div>
    <form><button formaction="../login.php" id="logoutButton" type="submit">Log Out</button></form>
  </div>
<div class="imgcontainer">
    <img src="../images/img_avatar1.png" id="Avatar" alt="Avatar" class="avatar">
</div>

    <div>
      <h1>People Health Pharmacy</h1>
      <h2>Add a Sale</h2>

    </div>
      <form  method="post" action="add_sales_items.php">

			<fieldset id="add_sale_Field">


      <input type="number" placeholder="Enter Customer ID" name="customerID" required>
      <br>
    
      <input type="datetime-local" placeholder="" name="orderDate">
      <br>

      <input type="number" placeholder="Enter Employee ID" name="employeeID" required>
      <br>
      <button id="addSales" name="addSales" type="submit">Submit</button>
      <br>
      </fieldset>
    </form>

    <form><button formaction="../scripts/home.php" id="backButton" type="submit">Back</button></form>


  </section>

</body>
</html>
