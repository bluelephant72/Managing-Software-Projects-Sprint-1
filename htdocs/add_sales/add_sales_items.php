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


  <!-- <script type='text/javascript'>
        function addFields(){
            // Number of inputs to create
            var number = document.getElementById("member").value;
            // Container <div> where dynamic content will be placed
            var container = document.getElementById("container");
            // Clear previous contents of the container
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }
            for (i=0;i<number;i++){
                // Append a node with a random text
                container.appendChild(document.createTextNode("Member " + (i+1)));
                // Create an <input> element, set its type and name attributes
                var input = document.createElement("input");
                input.type = "text";
                input.name = "member" + i;
                container.appendChild(input);
                // Append a line break 
                container.appendChild(document.createElement("br"));
            }
        }
    </script> -->
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
      <h2>Add Items for a Sale</h2>

    </div>
      <form  method="post" action="../scripts/php_ordering.php">

			<fieldset id="add_sale_Field">

    <input type="number" placeholder="Enter Product ID" name="productID" required>
    <br>

    <input type="number" placeholder="Enter Quantity" name="quantity" required>
    <br>
      
      <!-- <input type="text" id="member" name="member" value="">Number of members: (max. 10)<br />
      <a href="#" id="filldetails" onclick="addFields()">Fill Details</a>
      <div id="container"> -->


    </form>

    <form><button formaction="../add_sales.php" id="backButton" type="submit">Back</button></form>


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
    $_Session["customerID"] = $customerID;
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
    $_Session["orderDate"] = $orderDate;
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
    $_Session["employeeID"] = $employeeID
}

