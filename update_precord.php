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
$Query='select *from add_person_record where id="'.$edit_record.'"';
$run=mysqli_query($link,$Query);
while ($row = mysqli_fetch_array($run))
{
	$edit_id=$row['id'];
	$person_name=$row['person_name'];
	$product=$row['product'];
	$total_amount=$row['t_amount'];
	$paid_amount_memo=$row['amount_memo'];
	$cheque_no=$row['cheque_no'];
	$paid_amount=$row['p_amount'];
	$due_amount=$row['d_amount'];
	$date=$row['date'];
}
}
//update 
if(isset($_POST['update_record']))
{
	$edit_record1=$_GET['edit_form'];
	$Update_Person_Name=$_POST['u_p_name'];
	$Update_Product=$_POST['u_product'];
	$Update_Total_Amount=$_POST['u_t_amount'];
	$Update_Amount_Memo=$_POST['u_amount_m'];
	$Update_cheque_No=$_POST['u_c_no'];
	$Update_Paid_Amount=$_POST['u_p_amount'];
	$Update_Due_Amount=$_POST['u_d_amount'];
	$Update_Date=$_POST['u_date'];
	/*echo '<script>alert("'.$_GET['edit_form'].'");</script>';*/
	$query1='update add_person_record set person_name="'.$Update_Person_Name.'",product="'.$Update_Product.'",t_amount="'.$Update_Total_Amount.'",amount_memo="'.$Update_Amount_Memo.'",cheque_no="'.$Update_cheque_No.'",p_amount="'.$Update_Paid_Amount.'",d_amount="'.$Update_Due_Amount.'",date="'.$Update_Date.'" where id="'.$edit_record1.'"';
	if(mysqli_query($link,$query1)){
		echo '<script>alert("Record Has Been Updated Successfully")</script>';
		header("Location:update_delete_record.php");
		}
		else{
			echo '<script>window.open(update_record.php?update=your record has been not updated!","_self")</script>';
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
	<h1 style="text-align: center;">UPDATE PERSON RECORD</h1>
<div style="width: 75%; height:700px;  float: left;">
		<form method="post" action="update_precord.php?edit_form=<?php echo $edit_id;?>">
	<table cellpadding="30" cellspacing="15">
		<tr>
			<td style="font-weight: bold;">Update Person Name:</td>
			<td><input type="text" name="u_p_name" id="u_p_name" value="<?php echo $person_name?>" ></td>
			<td style="font-weight: bold;">Update Product:</td>
			<td><input type="text" name="u_product" id="u_product" value="<?php echo $product?>" ></td>
		</tr>
		<tr>
			
			
			<td style="font-weight: bold;">Update Total Amount:</td>
			<td><input type="text" name="u_t_amount" id="u_t_amount" value="<?php echo $total_amount?>"></td>
			<td style="font-weight: bold;">Update Amount Memo:</td>
			<td><input type="text" name="u_amount_m" value="<?php echo $paid_amount_memo?>"></td>
		</tr>
			<tr>
			
			<td style="font-weight: bold;">Update cheque No</td>
			<td><input type="text" name="u_c_no" id="u_c_no" value="<?php echo $cheque_no?>" ></td>
			
			<td style="font-weight: bold;">Update Paid Amount:</td>
			<td><input type="text" name="u_p_amount" id="u_p_amount" value="<?php echo $paid_amount?>"></td>
			
		</tr>
		<tr>
			
			<td style="font-weight: bold;">Update Due Amount:</td>
			<td><input type="text" name="u_d_amount" id="u-d_amount" value="<?php echo $due_amount?>"></td>
			<td style="font-weight: bold;">Update Date:</td>
			<td><input type="date" name="u_date" id="u_date" value="<?php echo $date?>" style="   width: 100%; padding: 12px 20px;margin: 8px 0;box-sizing: border-box;height: 40px;color:black;font-weight: bold;border-radius: 5px; border: none;"></td>
		</tr>
		<tr>
		
			
			<td><div class="tooltip"><input type="submit" name="update_record" id="update_record" value="Update Record"><span class="tooltiptext">Click Now</span></div></td>
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
