<?php

session_start();
include("database.php");
if(isset($_SESSION['name'])){

}else{
	header("location:index.php");
}
if(isset($_GET['update']))
{
	global $link;
$edit_record=$_GET['update'];
$Query='select *from category where c_id="'.$edit_record.'"';
$run=mysqli_query($link,$Query);
while ($row = mysqli_fetch_array($run))
{
	$edit_id=$row['c_id'];
	$name=$row['c_name'];

}
}

//update 
if(isset($_POST['u_catgories']))
{
	$edit_record1=$_GET['edit_form'];
	$Update_cat_Name=$_POST['u_c_name'];
	/*echo '<script>alert("'.$_GET['edit_form'].'");</script>';*/
	$query1='update category set c_name="'.$Update_cat_Name.'" where c_id="'.$edit_record1.'"';
	if(mysqli_query($link,$query1)){
		echo '<script>alert("Record Has Been Updated Successfully")</script>';
		header("Location:update_delete_category.php");
		}
		else{
			echo '<script>window.open(update_cat.php?update=your record has been not updated!","_self")</script>';
		}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Category</title>
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
<h1 style="text-align: center;">UPDATE CATEGORY</h1>	
<form method="post" action="update_cat.php?edit_form=<?php echo $edit_id;?>">
	<table class="table">
		<tr>
			<td style="font-weight: bold;">Update Category Name:</td>
			<td><input type="text" name="u_c_name" id="u_c_name" required value="<?php echo $name?>"></td>
		</tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		
		<tr>
			<td><a href="main_page.php" style="text-decoration: none; color:white;"><h3>GO BACK</h3></a></td>
			<td><div class="tooltip"><input type="submit" name="u_catgories" id="u_catgories" value="Update Category"><span class="tooltiptext">Click Now</span></div></td>
		</tr>
	</table>
	<p id="result" style="color: Lime; text-align: center;"></p>
</form>
</div>
</body>
</html>