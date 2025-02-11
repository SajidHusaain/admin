<!Doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Preview</title>
<link href="css/styling.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/style.css">
<style type="text/css">
    input{
         border:none;border-bottom: ridge;
         text-align: center;
    }
</style>
</head>
<body>
<?php
  session_start();
  //Check whether the session variable SESS_MEMBER_ID is present or not
include('db_connection.php'); 
$reciept=$_SESSION['SESS_MEMBER_ID'];
$result = mysqli_query($con,"SELECT * FROM sales where reciept = '$reciept'");
while($row = mysqli_fetch_array($result))
  {
    $Quantity=$row['p_quantity'];
    }
$f=$_SESSION['SESS_MEMBER_ID'];
    $run_get_record=mysqli_query($con,"SELECT * FROM bill where reciept = '$f'");
    while ($row_run_get_record=mysqli_fetch_array($run_get_record))
    {
      
		$reciept=$row_run_get_record['reciept_no'];
		$qty=$row_run_get_record['qty'];
		$price=$row_run_get_record['price'];
		$discount_percantage=$row_run_get_record['discount_percantage'];
		$discount_amount=$row_run_get_record['discount_amount'];
		$amount_due=$row_run_get_record['amount_due'];
		$paid_amount=$row_run_get_record['paid_amount'];
    $balance_due=$row_run_get_record['balance_due'];
    }

?>
<center><h3 style="color: #8394C9;font-size: 30px">Kurta Town</h3><br /><br /></center>
<div id="page-wrap">
<center>
<table cellspacing="10">
<tr><td><label>Reciept No:</label>  <input type="text" name="reciept" value="<?php echo $reciept; ?>" placeholder="2017-000-0-STO" readonly=""></td><td><label>Contact</label><input type="text" value="03453477512" readonly="" style="font-size: 20px"></td><td><label>Date</label>  <input type="text" name="date" value="<?php echo $date; ?>" placeholder="dd/MM/YYYY" readonly=""></td></tr>
</table></center>
<table id="items" style="background-color: #fff">
    
      <tr>
          <th>Item</th>
          <th>Product Code</th>
          <th>Unit Cost</th>
          <th>Quantity</th>
          <th>Price</th>
      </tr>
      
<!--      <tr class="item-row">
          <td class="item-name"><div class="delete-wpr"><textarea>Web Updates</textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>
          <td class="description">hjnbujnbjonj</td>
          <td><textarea class="cost">€650.00</textarea></td>
          <td><textarea class="qty">1</textarea></td>
          <td><span class="price">€650.00</span></td> -->
                 <?php 
            global $con;
$f=$_SESSION['SESS_MEMBER_ID'];
$result = mysqli_query($con,"SELECT * FROM sales where reciept = '$f'");
  while($row = mysqli_fetch_array($result))
  {
      echo '<tr class="item-row">';
        echo '<td class="description" style="text-align:center">'.$row['p_name'].'</td>';
        echo '<td style="padding-left:20px">'.$row['p_desc'].'</td>';
        echo '<td style="text-align:center">'.$row['p_price'].'</td>';
        echo '<td style="text-align:center">'.$row['p_quantity'].'</td>';
        echo '<td style="text-align:center">'.$row['total_price'].'</td>';
      echo '</tr>';
    
    }

mysqli_close($con); ?>
        <tr>
          <td colspan="2" class="blank"> </td>
          <td colspan="2" class="total-line">Subtotal :</td>
          <td class="total-value"><div id="subtotal">
<input type="text" style="text-align: left;" value="<?php echo $price;?>" readonly>  
          </div></td>
      </tr>
      <tr>
          <td colspan="2" class="blank"> </td>
          <td colspan="2" class="total-line">Discount :</td>
          <td class="total-value"> <input type="text" value="<?php echo $discount_percantage?>" readonly></td>
      </tr>
      <tr>
          <td colspan="2" class="blank"> </td>
          <td colspan="2" class="total-line">Total  Discount :</td>

          <td class="total-value">
          <input type="text" name="tdiscount" id="tdiscount" value="<?php echo $discount_amount?>" style="text-align:left" readonly/> </td>
      </tr>
      <tr>
          <td colspan="2" class="blank"> </td>
          <td colspan="2" class="total-line">Amount Due :</td>
          <td class="total-value"><input style="background-color: unset; text-align: left;" name="gtotal" id="gtotal" size="17" readonly value="<?php echo $amount_due;?>"/></td>
      </tr>
          <tr>
          <td colspan="2" class="blank"> </td>
          <td colspan="2" class="total-line">Paid Amount :</td>
          <td class="total-value"><input type="text" value="<?php echo $paid_amount ?>"  style="text-align: left; border-radius: 5px;border:1px blue solid; background: #065CB7;color: white"></td>
      </tr>
          <tr>
          <td colspan="2" class="blank"> </td>
          <td colspan="2" class="total-line balance">Balance Due</td>
          <td class="total-value balance">
          <input style="text-align: center;background-color: unset;" type="text" value="<?php echo $balance_due ?>"" readonly>
          </td>
      </tr>
    </table>
    </div>
<!-- <tr><th>Name</th><th>Description</th><th>Quantity</th><th>Price</th><th>Total Price</th></tr>
	  <?php
$link = mysqli_connect("localhost", "root", "", "admin");
$f=$_SESSION['SESS_MEMBER_ID'];
$result = mysqli_query($link,"SELECT * FROM sales where reciept = '$f'");

while($row = mysqli_fetch_array($result))
  {
      echo '<tr>';
	  	echo '<td>'.$row['p_name'].'</td>';
        echo '<td>&nbsp;&nbsp;&nbsp;'.$row['p_desc'].'</td>';
        echo '<td>'.$row['p_quantity'].'</td>';
        echo '<td>'.$row['p_price'].'</td>';
        echo '<td>'.$row['total_price'].'</td>';
      echo '</tr>';
	  
	  }

?>
<tr><td><label>From </label>  <input type="text" name="" placeholder="dd/MM/YYYY" readonly=""></td><td><label>To</label>  <input type="text" name="" placeholder="dd/MM/YYYY" readonly=""></td><td>Paid By<br />
[ ]Cash<br />
[ ]Check No  <input type="text" name="cheque_no" readonly="" placeholder="524000-69240002-045504-31"></td></tr>
<tr><td><label>Recieved By</label>  <input type="text" name="user_name" value="<?php?>" placeholder="User Name" readonly=""></td><td style="border: solid;"><br /><label>Total Amount</label>  <input type="text" name="t_amount" placeholder="Total Amount" readonly=""><br /><br /><label>Paid Amount</label>  <input type="text" name="p_amount" placeholder="Paid Amount" readonly=""><br /><br /><label>Due Amount</label>  <input type="text" name="d_amount" placeholder="Due Amount" readonly=""></td></tr>
</table> -->
</body>
</html>