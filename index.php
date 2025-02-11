<?php
session_start();
include("database.php");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$name=$_POST['name'];
$pass=$_POST['password'];
$query="select * from admin_login where name='$name' and password='$pass'";
$run_query=mysqli_query($link,$query);
$row=mysqli_fetch_assoc($run_query);
if($row > 0){
	$_SESSION['name']=$name;
header("location:main_page.php");
}
else{
	echo "Login Failed";
}
}
?> 
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="style.css" media="all" />
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript">
		//start login into database
			/*$(document).ready(function(){
				$('#login').click(function(event){
				event.preventDefault();

				$.ajax({
				url:"admin_login_ajax.php",
				method: "post",
				data:$('form').serialize(),
				dataType:"text",
				success:function(strMessage){
					$('#result').text(strMessage)
					alert("Login Successfully");

					//window.location.reload();

				}


				})
			

			})
		})*/
		//end login into database

	</script>
</head>
<body>

<div class="container">
<h1>ADMIN LOGIN</h1>	
<form method="post">
	<table class="table">
		<tr>
			<td style="font-weight: bold;">Enetr Name:</td>
			<td><input type="text" name="name" id="name" placeholder="Enetr Your Name....."></td>
		</tr>
		<tr>
			<td style="font-weight: bold;">Enetr Password:</td>
			<td><input type="password" name="password" id="password" placeholder="Enetr Your Password....."></td>
		</tr>
		<tr>
			<td></td>
			<td><div class="tooltip"><input type="submit" name="login" id="login" value="Login"><span class="tooltiptext">Click Now</span></div></td>
		</tr>
	</table>
</form>
</div>
</body>
</html>