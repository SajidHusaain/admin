<?php
include("database.php");
$name=$_POST['name'];
$pass=$_POST['password'];
$query="select * from admin_login where name='$name' and password='$pass'";
$run_query=mysqli_query($link,$query);
$row=mysqli_fetch_assoc($run_query);
if($row > 0){
header("location:main_page.php");
}
else{
	echo "Login Failed";
}
?> 