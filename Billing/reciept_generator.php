<?php
	//Start session
	session_start();
	
include 'db_connection.php';
global $con;
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
$result = mysqli_query($con,"SELECT * FROM reciept_code");
while($row = mysqli_fetch_array($result))
  {
        $fefe=$row['code']; 
  }
  $sasa=$fefe+1;

	
mysqli_query($con,"UPDATE reciept_code SET code = '$sasa'");
$fgh='000'.$sasa;						
$finalcode=date("Y-m-$fgh").'-STO';						

			session_regenerate_id();
			$_SESSION['SESS_MEMBER_ID'] = $finalcode;
			session_write_close();
			header("location: invoice_test.php");
			exit();
		
		
		
mysqli_close($con);		
		
	
?>