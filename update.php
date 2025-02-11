<?php

session_start();
include("database.php");
if(isset($_SESSION['name'])){

}else{
	header("location:index.php");
}
//fetch data

if(isset($_GET['update']))
{
	global $link;
$edit_record=$_GET['update'];
$Query='select *from add_person where per_id="'.$edit_record.'"';
$run=mysqli_query($link,$Query);
while ($row = mysqli_fetch_array($run))
{
	$edit_id=$row['per_id'];
	$person_name=$row[1];
	$person_contact=$row[2];
	$person_address=$row[3];
	
}
}


//update data
if(isset($_POST['update_record']))
{
	$edit_record1=$_GET['edit_form'];
	$name=$_POST["u_name"];
	$con=$_POST["u_contact"];
	$add=$_POST['u_address'];
	$update='update add_person set per_name="'.$name.'",per_contact="'.$con.'",per_address="'.$add.'" where per_id="'.$edit_record1.'"';
	
	if(mysqli_query($link,$update)){
		echo '<script>alert("Record Has Been Updated Successfully")</script>';
		header("Location:update_person.php");
		}
		else{
			echo '<script>window.open(update_record.php?update=your record has been not updated!","_self")</script>';
		}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Person</title>
	<link rel="stylesheet" type="text/css" href="style.css" media="all" />
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript">
		
		//end login into database

	</script>
</head>
<body>

<div class="container">
<h1>UPDATE PERSON</h1>	
<form method="post" action="update.php?edit_form=<?php echo $edit_id;?>">
	<table class="table">
		<tr>
			<td style="font-weight: bold;">Update Person Name:</td>
			<td><input type="text" name="u_name" id="u_name" value="<?php echo $person_name;?>" ></td>
		</tr>
		<tr>
			<td style="font-weight: bold;">Update Person Contact:</td>
			<td><input type="text" name="u_contact" id="u_contact" value="<?php echo $person_contact;?>" ></td>
		</tr>
		<tr>
			<td style="font-weight: bold;">Update Person Address:</td>
			<td><input type="text" name="u_address" id="u_address" value="<?php echo $person_address;?>"></td>
		</tr>
		<tr>
			<td><a href="main_page.php" style="text-decoration: none; color:white;"><h3>GO BACK</h3></a></td>
			<td><div class="tooltip"><input type="submit" name="update_record" id="update_record" value="Update"><span class="tooltiptext">Click Now</span></div></td>
		</tr>
	</table>
	<p id="result" style="color: Lime; text-align: center;"></p>
</form>
</div>
</body>
</html>




