<?php
include('function.php');

$delete_record=$_GET['del'];
$query='delete from products where pro_id='.$delete_record.'';
if(mysqli_query($link,$query)){
	echo '<script>alert("Record Deleted Successfully")</script>';
	header("Location:delete_product.php");
	}

?>