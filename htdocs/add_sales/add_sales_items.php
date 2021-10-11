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
        function addFields(){
            // Number of inputs to create
            var number = document.getElementById("items").value;
            // Container <div> where dynamic content will be placed
            var container = document.getElementById("container");
            // Clear previous contents of the container
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }
            for (i=0;i<number;i++){
                // Append a node with a random text
                container.appendChild(document.createTextNode("Product " + (i+1) + " ID"));
                // Create an <input> element, set its type and name attributes
                var input = document.createElement("productID");
                input.type = "number";
                input.name = "productID" + i;

                container.appendChild(document.createTextNode("Quantity of Product " + (i+1)));
                var input = document.createElement("quantity");
                input.type = "number";
                input.name = "quantity" + i;

                container.appendChild(input);
                // Append a line break 
                container.appendChild(document.createElement("br"));
            }
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
    <form  method="post" action="../scripts/php_ordering.php">

		<fieldset id="add_sale_Field">

        <input type="text" id="items" name="items" value="">Number of products: (max. 10)<br />
        <a href="#" id="items" onclick=addFields()>Enter Number</a>
        <div id="container">
        
        
        <button formaction="../scripts/php_ordering.php" id="addSalesItems" type="submit">Submit</button>

    </form>

    <form></form>


  </section>

</body>
</html>

<?php
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
    $_Session["customerID"] = $customerID;
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
    $_Session["orderDate"] = $orderDate;
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
    $_Session["employeeID"] = $employeeID;
} 

