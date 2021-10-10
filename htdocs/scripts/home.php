<!--logIn page-->
<!DOCTYPE html>
<html lang="en">
	<!--Head meta-->
<head>
  <meta charset="utf-8" />
  <meta name="description" content="home" />
  <meta name="keywords" content="HTML, Form, tags,payment" />
  <meta name="author" content="Anis, Eamonn, Jonno, Leonard" />
  <link rel="stylesheet" type="text/css" href="../styles/style_home.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">

  <title>Home</title>
</head>

<body>
<section id="home_form">
    <div class="imgcontainer">
        <img src="../images/img_avatar1.png" id="Avatar" alt="Avatar" class="avatar">
    </div>
    <div>
        <h1>People Health Pharmacy</h1>
        <h2>Welcome Back</h2>
    </div>
    <div>
        <b>Would you like to?</b>
        <br>
        <form method="get" action="../add_sales/add_sales.php"> <button id="addSalesNavi" type="submit">Add a Sale</button></form>
        <form method="get" action="../view_sales/display.php"> <button id="viewReportsNavi" type="submit">View Sales Reports</button>
    </div>
    <br>
    <div>
        <form><button formaction="../login.php" id="logoutButton" type="submit">Log Out</button></form>
    </div>
</section>
</body>
