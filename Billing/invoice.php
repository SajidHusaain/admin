<?php
 session_start();
  //Check whether the session variable SESS_MEMBER_ID is present or not
include('db_connection.php');
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Invoice System</title>
      <link rel="stylesheet" media="all" href="css/model_style.css">
      <!--Bootstrap CDN Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="JQuery/JQuery.js"></script>
<!-- Bootstrap CDN Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/style.css">
<style type="text/css">
	input{
		border:0;
		text-align: right;
	}
  .index-form{
  width: 100%;
  padding-top: 60px;
  padding-bottom: 60px;
}
</style>
<?php $timestamp=time(); 
  $da=date(" d Y", $timestamp);
$mons = array(1 => "January", 2 => "February", 3 => "March", 4 => "April", 5 => "May", 6 => "June", 7 => "July", 8 => "August", 9 => "September", 10 => "October", 11 => "November", 12 => "December");

$date = getdate();
$month = $date['mon'];

$month_name = $mons[$month];
    global $con;
    ?>
<body>
  <html lang="en">

<head>
	<meta charset='UTF-8'>
	
	<title>Editable Invoice</title>
<script type="text/javascript">
    function ShowTime()
    {
      var time=new Date()
      var h=time.getHours()% 12 || 12; 
      var m=time.getMinutes()
      var s=time.getSeconds()
var d = new Date();
      // add a zero in front of numbers<10
      m=checkTime(m)
      s=checkTime(s)
      document.getElementById('time').value=h+" : "+m+" : "+s
      t=setTimeout('ShowTime()',1000)
    
    a=Number(document.form.QTY.value);

if (a!=0) // some logic to determine if it is ok to go
    {document.getElementById("xx").disabled = false;}
  else // in case it was enabled and the user changed their mind
    {document.getElementById("xx").disabled = true;}
  
    }
    function checkTime(i)
    {
      if (i<10)
      {
        i="0" + i
      }
      return i
    }
    function multiply(){

a=Number(document.form.QTY.value);

b=Number(document.form.p_price.value);


c=a*b;


document.form.TOTAL.value=c;
i=Number(document.mn.cash.value);
p=Number(document.mn.amount.value);
l=Number(document.ble.gtotal.value);
k=Number(document.mn.payable.value);

if (l<=i) // some logic to determine if it is ok to go
    {document.getElementById("ble").disabled = false;}
  else if (l<=p) // some logic to determine if it is ok to go
    {document.getElementById("ble").disabled = false;}
  
  else if (k>0) // some logic to determine if it is ok to go
    {document.getElementById("ble").disabled = false;}
  else // in case it was enabled and the user changed their mind
    {document.getElementById("ble").disabled = true;} 
  
  
    }
    function checkTime(i)
    {
      if (i<10)
      {
        i="0" + i
      }
      return i
    }
    </script>
<script language="javascript" type="text/javascript">
 function addCommas(nStr){
 nStr += '';
 x = nStr.split('.');
 x1 = x[0];
 x2 = x.length > 1 ? '.' + x[1] : '';
 var rgx = /(\d+)(\d{3})/;
 while (rgx.test(x1)) {
  x1 = x1.replace(rgx, '$1' + ',' + '$2');
 }
 return x1 + x2;
}
      function mul(){
b=Number(document.mn.tretail.value);
d=Number(document.mn.aba.value);


c=b*d;
o=b-c;
D=o.toFixed(2)

document.mn.tdiscount.value=addCommas(c);
document.mn.gtotal.value=D;
document.mn.gtotal1.value=addCommas(D);
}
function total(){
b=Number(document.mn.gtotal.value);
d=Number(document.mn.paid_amount.value);


c=b-d;
D=c.toFixed(2);
if(D<0){
E=D*-1;
document.mn.total_amount.value=E;
}else{
  E=D;
document.mn.total_amount.value=E;
}
}
function minus(){

a=Number(document.mn.cash.value);

b=Number(document.mn.gtotal.value);

c=a-b;

document.mn.change.value=c;

}
</script>
</head>

<body onload="ShowTime()">

	<div id="page-wrap">

		<input type="text" id="header" value="INVOICE" style="height: 25px;">
		
		<div id="identity">
		
            <textarea id="address">Chris Coyier
123 Appleseed Street
Appleville, WI 53719

Phone: (555) 555-5555</textarea>

          <!--  <div id="logo">

              <div id="logoctr">
                <a href="javascript:;" id="change-logo" title="Change logo">Change Logo</a>
                <a href="javascript:;" id="save-logo" title="Save changes">Save</a>
                |
                <a href="javascript:;" id="delete-logo" title="Delete logo">Delete Logo</a>
                <a href="javascript:;" id="cancel-logo" title="Cancel changes">Cancel</a>
              </div>

              <div id="logohelp">
                <input id="imageloc" type="text" size="50" value="" /><br />
                (max width: 540px, max height: 100px)
              </div>
              <img id="image" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/9325/logo.png" alt="logo" />
            </div>  -->
		<p style="padding-left: 650px;font-size: 30px;color: #E6A43F">Hi Kidz</p>
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">

            <textarea id="customer-title" readonly style="">Made By                       Global JAS Tech
            </textarea>

            <table id="meta">
                <tr>
                    <td class="meta-head">Invoice #</td>
                    <td><input type="text" name="" readonly value="<?php echo $_SESSION['SESS_MEMBER_ID']; ?>"></td>
                </tr>
                <tr>

                    <td class="meta-head">Date</td>
                    <td><input type="text" name="" readonly value="<?php echo $month_name.$da ?>"></td>
                </tr>
                <tr>
                    <td class="meta-head">Time</td>
                    <td><input type="text" name="time" id="time" readonly></td>
                </tr>

            </table>
		
		</div>
		
		<table id="items">
		
		  <tr>
		      <th>Item</th>
		      <th>Description</th>
		      <th>Unit Cost</th>
		      <th>Quantity</th>
		      <th>Price</th>
		  </tr>
		  
<!-- 		  <tr class="item-row">
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
      echo '<form method="post" action="" enctype="multipart/form-data">';
       echo '<input name="up_id" value="'.$row['id'].'" type="hidden">';
        echo '<td class="description"><div class="delete-wpr">'.$row['p_name'].'<a class="delete" href=delete.php?id=' . $row["id"] .'>X</a></div></td>';
        echo '<td style="padding-left:20px">'.$row['p_desc'].'</td>';
        echo '<td>'.$row['p_price'].'</td>';
        echo '<td>'.$row['p_quantity'].'</td>';
        echo '<td><div class="update-wpr">'.$row['total_price'].'<a class="btn btn-lg update" data-toggle="modal" data-target="#basicModal" style="left:102.5%;padding: 0px 3px;border-radius:0;width:25px;"><input type="submit" name="data" value="+"></a></div></td>';
        echo '</form>';
      echo '</tr>';
    
    }

mysqli_close($con); ?>
<form method="post" name="mn" id="suggestSearch">
		    <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Subtotal :</td>
		      <td class="total-value"><div id="subtotal">
            <?php
 $con = mysql_connect("localhost","root","");
 if (!$con)
   {
   die('Could not connect: ' . mysql_error());
   }

 mysql_select_db("admin", $con);
 $f=$_SESSION['SESS_MEMBER_ID'];
 $result = mysql_query("SELECT sum(total_price) FROM sales where reciept = '$f'");

 while($row2 = mysql_fetch_assoc($result))
   {
       $yy=$row2['sum(total_price)'];
  
     }
mysql_close($con);
?>
<input type="text" name="tretail" id="tretail" style="text-align: left;" value="<?php echo $yy;?>" readonly>  
          </div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Discount :</td>
		      <td class="total-value"><div id="total">
          <select name="aba" onchange="mul()" style=" margin-right:76px;">
          <option value=".00">none</option>
          <option value=".05">5%</option>
          <option value=".10">10%</option>
          <option value=".15">15%</option>
          <option value=".20">20%</option>
          <option value=".25">25%</option>
          <option value=".30">30%</option>
          <option value=".35">35%</option>
          <option value=".40">40%</option>
          <option value=".45">45%</option>
          <option value=".50">50%</option>
          </select></div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Total  Discount :</td>

		      <td class="total-value">
          <input type="text" name="tdiscounttdiscount" id="tdiscount" style="text-align:left" readonly/> </td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Amount Due :</td>
		      <td class="total-value"><input style="background-color: unset; text-align: left;" name="gtotal" id="gtotal" size="17" readonly value="<?php echo $yy;?>"/></td>
		  </tr>
          <tr>
          <td colspan="2" class="blank"> </td>
          <td colspan="2" class="total-line">Paid Amount :</td>
          <td class="total-value"><input type="text" name="paid_amount" id="paid_amount" onkeyup="total()" style="text-align: left; border-radius: 5px;border:1px blue solid; background: #065CB7;color: white"></td>
      </tr>
          <tr>
          <td colspan="2" class="blank"> </td>
          <td colspan="2" class="total-line balance">Balance Due</td>
          <td class="total-value balance">
          <input style="text-align: center;background-color: unset;" type="text" name="total_amount" id="total_amount" readonly>
          </td>
      </tr>
		</form>
		</table>
		
		<div id="terms">
		  <h5>Terms</h5>
		  <textarea>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</textarea>
		</div>
	</div>
  <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Update Item</h4>
      </div>
      <div class="modal-body">  
           <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><img src="images/bag.png" width="19" height="19"></span>
              <input required="required" class="form-control" placeholder="Item Name..." maxlength="255" type="text" id="UserUsername" value="<?php echo @$up_id?>" style="text-align: left;"> 
            </div>
            </div>
             <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><img src="images/list.png" width="19" height="19"></span>
              <input name="data[User][username]" required="required" class="form-control" placeholder="Description..." maxlength="255" type="text" id="UserUsername" style="text-align: left;"> 
            </div>
            </div>
             <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><img src="images/money.png" width="19" height="19"></span>
              <input name="data[User][username]" required="required" class="form-control" placeholder="Unit Cost..." maxlength="255" type="text" id="UserUsername" style="text-align: left;"> 
           </div>
            </div>
             <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><img src="images/quantity.png" width="19" height="19"></span>
              <input name="data[User][username]" required="required" class="form-control" placeholder="Quantity..." maxlength="255" type="text" id="UserUsername" style="text-align: left;"> 
           </div>
            </div>
             <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><img src="images/price.png" width="19" height="19"></span>
              <input name="data[User][username]" required="required" class="form-control" placeholder="Price..." maxlength="255" type="text" id="UserUsername" style="text-align: left;"> 
            </div>
          </div>   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>