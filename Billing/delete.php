<?php
include 'db_connection.php';
global $con;
				  if (isset($_GET['id']))
	{
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
$messages_id = $_GET['id'];
$result = mysqli_query($con,"SELECT * FROM sales where id='$messages_id'");
while($row = mysqli_fetch_array($result))
  {
  $code=$row['reciept'];
  $f=$row['p_quantity'];
  $falagpat=$row['p_code'];
  }
  $previous_date=date('d.m.Y',strtotime("-1 days"));
$result1 = mysqli_query($con,"SELECT * FROM productlist where p_code='$falagpat'");

while($row1 = mysqli_fetch_array($result1))
  {
  $psold=$row1['p_sold'];
  $pleft=$row1['p_remaining'];
  }
  
$buwin=$psold-$f;
$dugang=$pleft+$f;
$AutoInc=$falagpat-1;
$update=mysqli_query($con,"UPDATE productlist SET p_sold = '$buwin', p_remaining = '$dugang'
WHERE p_code = '$falagpat'");
if($update > 0){
//   $result3 = mysqli_query($con,'SELECT MIN(id) AS min, MAX(id) AS max FROM sales') or exit(mysql_error()); 
// $row = mysqli_fetch_assoc($result3); 
// // echo 'the first id is ' $row['min'] . '<br>'; 
// $last=$row_last['max'];
mysqli_query($con,"DELETE FROM sales WHERE id='$messages_id'");
mysqli_query($con,"ALTER TABLE sales auto_increment ='$AutoInc'");
header("location: invoice_test.php?url=$last");
mysqli_close($con);
}
}
?>
<!-- DELETE FROM `sales` WHERE id=4;
UPDATE sales SET id=3 where id=5;
ALTER TABLE sales auto_increment =2;
 $last_id = mysqli_insert_id($conn); -->