<?php
include 'db_connection.php';
global $con;
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
   if(isset($_POST['submit'])){
$id=$_POST['id'];
$p_code=$_POST['p_code'];
$p_name=$_POST['p_name'];
$reciept=$_POST['invoice'];
$p_desc=$_POST['add_p_desc'];
$p_quantity=$_POST['QTY'];
$p_price=$_POST['add_p_price'];
$p_remaining=$_POST['add_p_stock'];
$date=$_POST['date'];
$time=$_POST['time'];
$total=$_POST['TOTAL'];
global $f;
global $m;
$result = mysqli_query($con,"SELECT * FROM productlist where id='$id'");

while($row = mysqli_fetch_array($result))
  {
   $f=$row['p_sold'];
  $m=$row['p_remaining'];

  }
  $ab=$f+$p_quantity;
	$ac=$m-$p_quantity;
if($p_quantity > $m ){
echo '<script>alert("Quantity is not in Stock");
window.location.href="invoice_test.php";
</script>';
}else{
  $insert=mysqli_query($con,"INSERT INTO sales (id,p_code,reciept, p_name, p_desc, p_quantity, p_price, total_price, selling_date,selling_time)
VALUES (null, '$p_code' , '$reciept', '$p_name', '$p_desc', '$p_quantity', '$p_price', '$total' , '$date' , '$time')");


mysqli_query($con,"UPDATE productlist SET p_sold = '$ab', p_remaining = '$ac'
WHERE id = '$id'");
if($insert > 0){
header("location: invoice_test.php");
}
}
}
?>