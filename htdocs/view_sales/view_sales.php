<!--logIn page-->
<!DOCTYPE html>
<html lang="en">
	<!--Head meta-->
<head>
  <meta charset="utf-8" />
  <meta name="description" content="view_sales" />
  <meta name="keywords" content="HTML, Form, tags, view_sales" />
  <meta name="author" content="Anis, Eamonn, Jonno, Leonard" />
  <link rel="stylesheet" type="text/css" href="../styles/styles_view_sales.css">
  
  <title>View Sales</title>
</head>
<body id="view_sales" >


<!--Time table (Table)-->
<section id="tableSection">
	
<img src="../images/img_avatar1.png" id="loginAvatar" alt="avatar Image" title="Filesize 2.76 KB " />

<div >
      <button id="logoutButton" type="submit">Log Out</button>
    </div>
		<!--Name-->	
	<h1 id="ProjectName">Sales Reports</h1>
    

	<p>​Recent Sales</p>
	<div id="addButton">
	<button id="addButton" type="submit">+</button>
	</div>
	<table id="salesViewTable">
	



	   <tbody>
	
		<tr>
			<th scope="col">10/09/2021</th>
			<td id="salesViewTableGray">TEST</td>
			<td id="salesViewTableGray"> </td>
			<td id="salesViewTableGray"> </td>
			<td id="salesViewTableGray"> </td>
			<td id="salesViewTableGray"> </td>
			<td id="salesViewTableGray"> </td>
			
		</tr>
		
		<tr>
			<th scope="col">22/01/2021</th>
			<td id="salesViewTableWhite"></td>
			<td id="salesViewTableWhite"></td>
			<td id="salesViewTableWhite"></td>
			<td id="salesViewTableWhite"></td>
			<td id="salesViewTableWhite"></td>
			
		</tr>
        <tr>
			<th scope="col">12/02/2021</th>
			<td id="salesViewTableGray"> </td>
			<td id="salesViewTableGray"> </td>
			<td id="salesViewTableGray"> </td>
			<td id="salesViewTableGray"> </td>
			<td id="salesViewTableGray"> </td>
			<td id="salesViewTableGray"> </td>

		</tr>
        <tr>
			<th scope="col">12/03/2021</th>
			<td id="salesViewTableWhite"></td>
			<td id="salesViewTableWhite"></td>
			<td id="salesViewTableWhite"></td>
			<td id="salesViewTableWhite"></td>
			<td id="salesViewTableWhite"></td>
		</tr>
        <tr>
			<th scope="col">04/03/2021</th>
			<td id="salesViewTableGray"></td>
			<td id="salesViewTableGray"></td>
			<td id="salesViewTableGray"></td>
			<td id="salesViewTableGray"></td>
			<td id="salesViewTableGray"></td>
			<td id="salesViewTableGray"></td>

		</tr>
		
	   </tbody>
	  
	   </table>

	   <div>
      <button id="exportReport" type="submit">Export Report</button>
    </div>
</section>

</body>
</html>