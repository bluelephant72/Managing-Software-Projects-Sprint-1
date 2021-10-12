<!--logIn page-->
<!DOCTYPE html>
<html lang="en">
	<!--Head meta-->
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Add Sale Items" />
    <meta name="keywords" content="HTML, Form, tags, addsales" />
    <meta name="author" content="Anis, Eamonn, Jonno, Leonard" />
    <link rel="stylesheet" type="text/css" href="../styles/styles_add_sales.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">


    <script type='text/javascript'>


    // Create a break line element
    var br = document.createElement("br"); 
    function addFields(){
    // Create a form synamically
    var form = document.createElement("form");
    form.setAttribute("method", "post");
    form.setAttribute("action", "../scripts/php_ordering.php");

    // Create an input element for Product ID
    var productID = document.createElement("input");
    productID.setAttribute("type", "number");
    productID.setAttribute("name", "productID");
    productID.setAttribute("placeholder", "Product ID");
    
    form.appendChild(productID);


     // Create an input element for quantity
     var quantity = document.createElement("input");
     quantity.setAttribute("type", "number");
     quantity.setAttribute("name", "quantity");
     quantity.setAttribute("placeholder", "Quantity");
    
    form.appendChild(quantity); 
    form.appendChild(br.cloneNode());

    // create a submit button
    var s = document.createElement("input");
    s.setAttribute("type", "submit");
    s.setAttribute("value", "Submit");

    form.appendChild(s); 

    document.getElementsByTagName("body")[0].appendChild(form);
    }
    </script>
    
</head>
<?php
	$page="add_sales_items";
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
      <h2>Add Items for a Sale</h2>

    </div>
    <p>

		<fieldset id="add_sale_Field">
        <p>Number of products: (max. 10)</p>
        <input type="text" id="items" name="items" value=""><br />
        <a href="#" id="items" onclick=addFields()>Enter Number</a>
        <div id="container">
        

    </p>




  </section>

</body>
</html>
<?php

session_start();

function sanitise_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//  if it is not submitted from add_sales, redirect
if (!isset($_POST["addSales"])) {
    header("location:add_sales_items.php");
    exit();
}
$err_msg = "";

// customerID
if (!isset($_POST["customerID"])) {
    header("location:add_sales_items.php");
    exit();
} else {
    $err_msg = "";
    $customerID = $_POST["customerID"];

    $customerID = sanitise_input($customerID);
    if ($customerID == "") {
        $err_msg .= "<p>Please enter customerID.</p>";
    }
    $_SESSION["customerID"] = $customerID;
}

// orderDate
if (!isset($_POST["orderDate"])) {
    header("location:add_sales_items.php");
    exit();
} else {
    $orderDate = $_POST["orderDate"];
    $orderDate = sanitise_input($orderDate);
    if ($orderDate == "") {
        $err_msg .= "<p>Please enter orderDate.</p>";
    }
    $_SESSION["orderDate"] = $orderDate;
}
// employeeID
if (!isset($_POST["employeeID"])) {
    header("location:add_sales_items.php");
    exit();
} else {
    $employeeID = $_POST["employeeID"];
    $employeeID = sanitise_input($employeeID);
    if ($employeeID == "") {
        $err_msg .= "<p>Please enter employeeID.</p>";
    }
    $_SESSION["employeeID"] = $employeeID;
} 

