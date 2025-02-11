<?php
session_start();
if(isset($_SESSION['name'])){

}else{
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Main Page</title>
	<link rel="stylesheet" type="text/css" href="style.css" media="all" />
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript">
		

	</script>
</head>
<body>

<div class="maincontainer" style="width: 100%; height: 645px; background: Azure;">

<div style="width: 90%; height: 130px; background: black; border-radius: 20px; color:white; margin-left: 65px;">
<table style="padding-top: 10px; width: 90%;" >
	<tr>
	<td width="10%"></td>
	<td width="20%" style="margin-left: 10px;">
    <img src="images/admins.png" > <h3><?php echo $_SESSION['name'];?></h3></td>	
	<td width="60%"></td>
	<td width="1%"><a href="admin_logout.php" style="text-decoration:none; color:white;"><img src="images/logouts.png"><h3>Logout</h3></a></td>
	</tr>

</table>
</div>

<div style="width: 90%; height: 670px; background: black; border-radius: 20px; margin-top: 10px; color:white; margin-left: 65px;">
	<h1 style="text-align: center;">WELLCOME TO ADMIN PAGE</h1>
	<table align="center" cellpadding="20" cellspacing="30">
		
		<tr style="text-align: center;">
		
			<td ><a href="search.php" style="text-decoration:none; color: white;">
			<img src="images/searchs.png">
			<h3>Search</h3></a></td>
			<td><a href="#" style="text-decoration:none; color: white;">
            <img src="images/ssss.png">
            <h3>Available Stock</h3></a></td>
			<td><a href="add_person.php" style="text-decoration:none; color:white;">
            <img src="images/add_persons.png">
            <h3>Add New Person</h3></a></td>
            <td><a href="add_person_record.php" style="text-decoration:none; color:white;">
            <img src="images/add_records.png">
            <h3>Add Person Record</h3></a></td>
             <td><a href="update_delete_record.php" style="text-decoration:none; color:white;">
            <img src="images/update_person_record.png">
            <h3>Update OR Delete Person Record</h3></a></td>
			
		</tr>
		<tr style="text-align: center;">
			<td><a href="update_person.php" style="text-decoration:none; color: white;">
            <img src="images/update_persons.png">
            <h3>Upate Person</h3></a></td>
			<td><a href="delete_person.php" style="text-decoration:none; color:white;">
            <img src="images/delete_persons.png">
            <h3>Delete person</h3></a></td>
			<td><a href="view_person.php" style="text-decoration:none; color:white;">
            <img src="images/view_persons.png">
            <h3>View Person</h3></a></td>
			<td><a href="add_products.php" style="text-decoration:none; color:white;">
            <img src="images/Add_products.png">
            <h3>Add New Products</h3></a></td>
            <td><a href="add_category.php" style="text-decoration:none; color:white;">
            <img src="images/add_p_c.png">
            <h3>Add Products Category</h3></a></td>
		</tr>
		<tr style="text-align: center;">
		<td><a href="update_products.php" style="text-decoration:none; color:white;">
            <img src="images/update_products.png">
            <h3>Update Products</h3></a></td>
			<td><a href="delete_product.php" style="text-decoration:none; color:white;">
            <img src="images/delete_products.png">
            <h3>Delete Products</h3></a></td>
			<td><a href="view_products.php" style="text-decoration:none; color:white;">
            <img src="images/view_products.png">
            <h3>View Products</h3></a></td>
            <td><a href="update_delete_category.php" style="text-decoration:none; color:white;">
            <img src="images/up_del.png">
            <h3>Update Or Delete Category</h3></a></td>
			<td><a href="Billing/reciept_generator.php" style="text-decoration:none; color:white;">
            <img src="images/bill.png">
            <h3>Billing System</a></h3></a></td>
		</tr>
	</table> 
</div>
</div>
</body>
</html>