<?php
include('function.php');

$delete_record=$_GET['del_cat'];
$query='delete from category where c_id='.$delete_record.'';
if(mysqli_query($link,$query)){
	echo '<script>alert("Record Deleted Successfully")</script>';
	header("Location:update_delete_category.php");
	}

?>

