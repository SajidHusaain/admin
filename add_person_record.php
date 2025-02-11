<?php

session_start();
include("database.php");
if(isset($_SESSION['name'])){

}else{
	header("location:index.php");
}

if(isset($_POST['add_record']))
{
	$add_person=$_POST['add_person'];
	$person_name=$_POST['p_name'];
	$product=$_POST['product'];
	$t_amount=$_POST['t_amount'];
	$select=$_POST['select'];
	$chq_no=$_POST['c_no'];
	$p_amount=$_POST['p_amount'];
	$d_amount=$_POST['d_amount'];
	$date=$_POST['date'];



	$insert_query="insert into add_person_record Values (null,'$add_person','$person_name','$product','$t_amount','$select','$chq_no','$p_amount','$d_amount','$date')";
	
	if (mysqli_query($link, $insert_query)) {
		
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
	<title>Add Person Record</title>
	<link rel="stylesheet" type="text/css" href="style.css" media="all" />
	<link rel="stylesheet" type="text/css" href="design.css" media="all" />
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript">
		

	</script>
</head>
<body>

<div class="maincontainer" style="width: 100%; height: 770px; background: Azure;">
<div style="width: 95%; height: 770px; background: black; border-radius: 20px; margin-top: 10px; color:white; margin:0 auto">
	<h1 style="text-align: center;">ADD PERSON RECORD</h1>
<div style="width: 75%; height:700px;  float: left;">
		<form method="post">
	<table cellpadding="30" cellspacing="15">
		<tr>
			<td style="font-weight: bold;">Select Person Name:</td>
			<td><select name="add_person" style="  width: 100%; padding: 12px 20px;margin: 8px 0;box-sizing: border-box;height: 40px;color:black;font-weight: bold;border-radius: 5px; border: none;">
				<option value="Select Person" selected disabled="">Select Person</option>
				<?php
				$get_person="select *from add_person";
				$run_get_person=mysqli_query($link,$get_person);
				while ($row_run_get_person=mysqli_fetch_assoc($run_get_person)) {
					$get_person_id=$row_run_get_person['per_id'];
					$get_person_name=$row_run_get_person['per_name'];
					echo "<li><option value='$get_person_id'>$get_person_name</option></li>";
				}
				?>
			</select></td>
			<td style="font-weight: bold;">Enetr Person Name:</td>
			<td><input type="text" name="p_name" id="p_name" placeholder="Enetr Person Name....." required></td>
		</tr>
		<tr>
			
			<td style="font-weight: bold;">Enetr Product:</td>
			<td><input type="text" name="product" id="product" placeholder="Enetr Products....." required></td>
			<td style="font-weight: bold;">Total Amount:</td>
			<td><input type="text" name="t_amount" id="t_amount" placeholder="Enetr Total Amount....." required></td>
			
		</tr>
			<tr>
			<td style="font-weight: bold;">Select Paid Amount:</td>
			<td><select name="select" style="  width: 100%; padding: 12px 20px;margin: 8px 0;box-sizing: border-box;height: 40px;color:black;font-weight: bold;border-radius: 5px; border: none;">
				<option  selected disabled>Select Any Option</option>
				<option>Cash</option>
				<option>Cheque</option>
			</select></td>
			<td style="font-weight: bold;">Enter cheque No</td>
			<td><input type="text" name="c_no" id="c_no" placeholder="Enetr Cheque Number....." required></td>
			
			
			
		</tr>
		<tr>
			<td style="font-weight: bold;">Paid Amount:</td>
			<td><input type="text" name="p_amount" id="p_amount" placeholder="Enetr Paid Amount....." required></td>
			<td style="font-weight: bold;">Due Amount:</td>
			<td><input type="text" name="d_amount" id="d_amount" placeholder="Enetr Due Amount....." required></td>
			
		</tr>
		<tr>
		<td style="font-weight: bold;">Current Date:</td>
			<td><input type="date" name="date" id="date" placeholder="Select Current Date....." required style="   width: 100%; padding: 12px 20px;margin: 8px 0;box-sizing: border-box;height: 40px;color:black;font-weight: bold;border-radius: 5px; border: none;"></td>
			
			<td><div class="tooltip"><input type="submit" name="add_record" id="add_record" value="Add Record"><span class="tooltiptext">Click Now</span></div></td>
			<td><a href="main_page.php" style="text-decoration: none; color:white;"><h3>GO BACK</h3></a></td>
			
		</tr>
		<tr></tr>

	</table>
	</form> 
</div>
<div style="width: 25%; height:700px; ; float: left;" >
	<!--calculator-->
	<div style="width: 90%; height: 400px; margin: 0 auto; margin-top: 80px;" id="calculator">
	<form>
		<input type="text" id="display" placeholder="0"><br>
		<input type="button" value="C" id="keys" onclick="addtoscreen('c')">
		<input type="button" value="<--" id="keys" onclick="backspace()">
		<input type="button" value="X^3" id="keys" onclick="power(3)">
		<input type="button" value="+" id="keys" onclick="addtoscreen('+')"><br>


		<input type="button" value="9" id="keys" onclick="addtoscreen('9')">
		<input type="button" value="8" id="keys" onclick="addtoscreen('8')">
		<input type="button" value="7" id="keys" onclick="addtoscreen('7')">
		<input type="button" value="-" id="keys" onclick="addtoscreen('-')"><br>

		<input type="button" value="6" id="keys" onclick="addtoscreen('6')">
		<input type="button" value="5" id="keys" onclick="addtoscreen('5')">
		<input type="button" value="4" id="keys" onclick="addtoscreen('4')">
		<input type="button" value="*" id="keys" onclick="addtoscreen('*')"><br>

		<input type="button" value="3" id="keys" onclick="addtoscreen('3')">
		<input type="button" value="2" id="keys" onclick="addtoscreen('2')">
		<input type="button" value="1" id="keys" onclick="addtoscreen('1')">
		<input type="button" value="/" id="keys" onclick="addtoscreen('/')"><br>

		<input type="button" value="0" id="keys" onclick="addtoscreen('0')">
		<input type="button" value="." id="keys" onclick="addtoscreen('.')">
		<input type="button" value="=" id="equal" onclick="answer()">

		
		
		
		

		
		

	</form>
	</div>
	<script type="text/javascript"  src="logic.js">
		
	</script>
	<!--calculator-->
</div>
</div>
</div>
</body>
</html>