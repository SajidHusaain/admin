<?php

session_start();
include("database.php");
if(isset($_SESSION['name'])){

}else{
	header("location:index.php");
}

if(isset($_POST['catgories']))
{
	$name=$_POST["c_name"];
	$insert="insert into category Values (null,'$name')";
	
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
	<title>Add Category</title>
	<link rel="stylesheet" type="text/css" href="style.css" media="all" />
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript">
		
		//end login into database

	</script>
</head>
<body>

<div style="width: 600px;
	height:400px;
	background: black;
	color: white;
	border-radius: 15px; 
	margin-left: 350px;
	/*margin-top: 100px;*/
	padding-right: 40px;
	margin-top: 130px;"><br>
<h1 style="text-align: center;">ADD CATEGORY</h1>	
<form method="post">
	<table class="table">
		<tr>
			<td style="font-weight: bold;">Enetr Category Name:</td>
			<td><input type="text" name="c_name" id="c_name" placeholder="Enetr Category Name....." required></td>
		</tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		
		<tr>
			<td><a href="main_page.php" style="text-decoration: none; color:white;"><h3>GO BACK</h3></a></td>
			<td><div class="tooltip"><input type="submit" name="catgories" id="catgories" value="Add Category"><span class="tooltiptext">Click Now</span></div></td>
		</tr>
	</table>
	<p id="result" style="color: Lime; text-align: center;"></p>
</form>
</div>
</body>
</html>