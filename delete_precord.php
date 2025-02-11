<?php
include('function.php');

$delete_record=$_GET['del_precord'];
$query='delete from add_person_record where id='.$delete_record.'';
if(mysqli_query($link,$query)){
	echo '<script>alert("Record Deleted Successfully")</script>';
	header("Location:update_delete_record.php");
	}

?>

