<?php
// configuration
include('connection.php');
include('db_connection.php');
// new data
$id = $_POST['memi'];
$a = $_POST['p_name'];
$b = $_POST['p_desc'];
$c = $_POST['p_price'];
$d = $_POST['p_quantity'];
$e = $_POST['total_price'];
// query
$result = mysqli_query($con,"SELECT * FROM sales where id='$id'");
while($row = mysqli_fetch_array($result))
  {
  $code=$row['reciept'];
  $f=$row['p_quantity'];
  $falagpat=$row['p_code'];
  }
  $result1 = mysqli_query($con,"SELECT * FROM productlist where p_code='$falagpat'");

while($row1 = mysqli_fetch_array($result1))
  {
  $psold=$row1['p_sold'];
  $pleft=$row1['p_remaining'];
  }
  $buwin=$psold-$f;
$dugang=$pleft+$f;
$update=mysqli_query($con,"UPDATE productlist SET p_sold = '$buwin', p_remaining = '$dugang'
WHERE p_code = '$falagpat'");
if($update > 0){
$sql = "UPDATE sales 
        SET p_name=?, p_desc=?, p_price=?, p_quantity=?, total_price=?
		WHERE id=?";
		$f=$d;
		$g=$pleft-$d;
$updates=mysqli_query($con,"UPDATE productlist SET p_sold = '$f', p_remaining = '$g'
WHERE p_code = '$falagpat'");
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e,$id));
header("location: invoice_test.php");
}
?>