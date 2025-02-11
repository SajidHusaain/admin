<?php

session_start();
include("database.php");
if(isset($_SESSION['name'])){

}else{
	header("location:index.php");
}

if(isset($_POST['register']))
{
	$name=$_POST["p_name"];
	$con=$_POST["contact"];
	$add=$_POST['address'];
	$insert="insert into add_person Values (null,'$name','$con','$add')";
	
	if (mysqli_query($link, $insert)) {
		
		echo "<script>alert('record inserted')</script>";
		# code...
	}
	else
	{
		echo "<script>alert('record insertion failed')</script>";
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Person</title>
	<link rel="stylesheet" type="text/css" href="style.css" media="all" />
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript">
		
		//end login into database

	</script>
</head>
<body>

<div class="container">
<h1>ADD PERSON</h1>	
<form method="post">
	<table class="table">
		<tr>
			<td style="font-weight: bold;">Enetr Person Name:</td>
			<td><input type="text" name="p_name" id="p_name" placeholder="Enetr Person Name....." required></td>
		</tr>
		<tr>
			<td style="font-weight: bold;">Enetr Person Contact:</td>
			<td><input type="text" name="contact" id="contact" placeholder="Enetr Person Contact....." required></td>
		</tr>
		<tr>
			<td style="font-weight: bold;">Enetr Person Address:</td>
			<td><input type="text" name="address" id="address" placeholder="Enetr Person Address....." required></td>
		</tr>
		<tr>
			<td><a href="main_page.php" style="text-decoration: none; color:white;"><h3>GO BACK</h3></a></td>
			<td><div class="tooltip"><input type="submit" name="register" id="register" value="Register"><span class="tooltiptext">Click Now</span></div></td>
		</tr>
	</table>
	<p id="result" style="color: Lime; text-align: center;"></p>
</form>
</div>
</body>
</html>