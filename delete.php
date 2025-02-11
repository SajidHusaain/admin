<?php
include('function.php');

$delete_record=$_GET['delete'];
$query='delete from add_person where per_id='.$delete_record.'';
if(mysqli_query($link,$query)){
	echo '<script>alert("Record Deleted Successfully")</script>';
	header("Location:delete_person.php");
	}

?>

