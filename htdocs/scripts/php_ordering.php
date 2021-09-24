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
        $err_msg .= "<p>Please enter password.</p>";
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
        $err_msg .= "<p>Please enter password.</p>";
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
        $err_msg .= "<p>Please enter password.</p>";
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
        $err_msg .= "<p>Please enter password.</p>";
    }
}

//record messages during database operations
$db_msg = "";
require_once "settings.php";
$conn = mysqli_connect($host, $user, $pwd, $sql_db);


if ($conn) {
    // Create order record
    $query = "INSERT INTO `order` (order_date, cust_id, emp_id)
    VALUES ('$orderDate', '$customerID', '$employeeID');";

    $order_created = mysqli_query($conn, $query);

    // Order created
    if ($order_created) {
        echo "Order created";

        $order_num = mysqli_insert_id($conn);

        // Add product
        $query = "INSERT INTO order_detail (order_num, product_id, quantity, sale_price)
        VALUES ('$order_num', '$productID', '$quantity', 0);";

        $insert_result = mysqli_query($conn, $query);

        echo "Data inserted successfully";

        if ($insert_result) {
            //   insert successfully
            $db_msg = "<p>User's info  inserted into the database.</p>"
                . "<table id='addSalesTable'><tr><th>Item</th><th>Value</th></tr>"
                . "<tr><th>customer ID</th><td>" . mysqli_insert_id($conn) . "</td></tr>"
                . "<tr><th>product ID</th><td>$productID</td></tr>"
                . "</table>";
        } else {
            $db_msg = "<p>Insert unsuccessful.</p>";
        }
    } else {
        $db_msg = "<p>Create table operation unsuccessful.</p>";
    }
    mysqli_close($conn);                    // Close the database connect
} else {
    $db_msg = "<p>Unable to connect to the database.</p>";
}
