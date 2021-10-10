<!--logIn page-->
<!DOCTYPE html>
<html lang="en">
<!--Head meta-->

<head>
	<meta charset="utf-8" />
	<meta name="description" content="login" />
	<meta name="keywords" content="HTML, Form, tags, login" />
	<meta name="author" content="Anis, Eamonn, Jonno, Leonard" />
	<link rel="stylesheet" type="text/css" href="styles/style.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">

	<title>Login</title>
</head>
<?php
	$page="login";
?>
<body id="loginPage">

	<!--Form Section-->
	<section id="formSection">

		<form id="loginForm" method="post" action="login_process.php">
			<!--Login field-->
			<fieldset id="loginField">
				<img src="images/img_avatar1.png" id="loginAvatar" alt="avatar Image" title="Filesize 2.76 KB " />


				<!--Name-->
				<h1 id="ProjectName">People Health</br>Pharmacy</h1>
				<p>Sales Reporting and Prediction System​</p>

				</br>
				</br>
				<input type="text" id="userName" placeholder="Username" name="userName" required />
				</br>
				</br>
				<input type="password" id="password" placeholder="Password" name="password" required />
				</br>
				</br>
				<span class="psw"><a href="#">Forgot password?</a></span>
   			    <br>
						<br />
				<!--Log in button-->
				<input id="loginButton" type="Submit" name="Login" value="Sign In" />

				<!-- Services button
				<form action="scripts/home.php"><button>Service Button</button></form>
				-->

				</br>
				</br>
			</fieldset>

		</form>
	</section>

</body>

</html>
