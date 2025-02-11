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

      <!--Bootstrap CDN Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="JQuery/JQuery.js"></script>
<!-- Bootstrap CDN Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link href="css/styling.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/style.css">
<!--sa poip up-->
<script src="argiepolicarpio.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<style type="text/css">
/*body{ height:100%;  background:  url(images/background.jpg) no-repeat center center fixed;
    background-size: cover; }*/
	input{
		border:0;
		text-align: right;
	}

  .index-form{
  width: 100%;
  padding-top: 60px;
  padding-bottom: 60px;
}
.snip1544 {
  font-family: 'Roboto', Arial, sans-serif;
  color: #000;
  font-weight: bold;
  cursor: pointer;
  padding: 0px 20px;
  display: inline-block;
  margin: 15px 30px;
  text-transform: uppercase;
  line-height: 2.7em;
  letter-spacing: 1.5px;
  font-size: 1em;
  outline: none;
  position: relative;
  font-size: 16px;
  border: 3px solid #6699FF;
  background-color: transparent;
  border-radius: 0 15px 15px;
  -webkit-transition: all 0.3s;
  transition: all 0.3s;
}

.snip1544:before {
  content: "";
  position: absolute;
  right: -3px;
  bottom: -3px;
  width: 0;
  height: 0;
  border-style: solid;
  border-width: 0 0 35px 35px;
  border-color: transparent transparent transparent;
  z-index: 1;
}

/*.snip1544:hover,
.snip1544.hover {
  border-color: #0a69c8;
}*/
    .search-box{
        width: 150px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 3px solid #CCCCCC;
        font-size: 14px;
        text-align: left;
        background: none;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 15px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
        cursor: pointer;
    }
    .result label:hover{
        background: #f2f2f2;
        cursor: pointer;
    }
</style>
<?php 
$timestamp=time(); 
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
    {
      document.getElementById("xx").disabled = false;
      document.getElementById("xx").style.borderColor='#0a69c8';
      document.getElementById("xx").style.color='#0a69c8';
      document.getElementById("xx").onmouseover = function() {this.style.borderColor='#ffffff';this.style.color='#ffffff'}
      document.getElementById("xx").onmouseout = function() {this.style.borderColor='#0a69c8';this.style.color='#0a69c8'}
}
  else // in case it was enabled and the user changed their mind
    {
      document.getElementById("xx").disabled = true;
      document.getElementById("xx").style.borderColor='red';
      document.getElementById("xx").style.color='red';
}
  
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

b=Number(document.form.add_p_price.value);


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
      function price_mul(){
e=Number(document.form.QTY.value);

f=Number(document.form.add_p_price.value);


g=f*e;


document.form.TOTAL.value=g;
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
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
<script src="JQuery/JQuery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var term = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(term.length){
            $.get("backend-search.php", {query: term}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
</head>

<body onload="ShowTime()">

	<div id="page-wrap">

		<input type="text" id="header" value="INVOICE" style="height: 25px;">
		
		<div id="identity">
    <form action="oerder.php" method="post" name="form">
    <table style=" border: 0px">
    <tr style=" border: 0px">
		<td style="background: unset;border: 0px"><label>Product Name:</label></td>
  <td style="background: unset;border: 0px">
     <?php
    $link = mysqli_connect("localhost", "root", "", "admin");
    if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="SELECT * FROM productlist where id=$id";
    $run=mysqli_query($link,$query);
    while($suggest = mysqli_fetch_array($run)) {
      $p_id=$suggest['id'];
      $p_code=$suggest['p_code'];
      $p_names=$suggest['p_name'];
      $p_desc=$suggest['pro_code'];
      $p_price=$suggest['p_single_piece_cost'];
      $p_remaining=$suggest['p_remaining'];
    }
}
    ?>
    <div class="search-box">
        <input type="text" id="p_name" name="p_name" autocomplete="off" placeholder="Search Product..." value="<?php if(isset($id)){echo $p_names; }?>" />
        <div class="result" style="background-color: #fff"></div>
    </div>
  </td>
    <td style="background: unset;border: 0px"><label>Product Quantity:</label></td>
  <td style="background: unset;border: 0px"><input type="text"  name="QTY" id="QTY" style="width: 105px;border:0px;text-align:center;background:none;font-size:15px;border: 3px solid #CCCCCC;width: 150px" onkeyup="multiply()"/></td>
  </tr>
    <tr style=" border: 0px">
    <td style="background: unset;border: 0px"><label>Product Code:</label></td>
  <td style="background: unset;border: 0px"><input type="text" id="add_p_desc" name="add_p_desc" value="<?php if(isset($id)){echo $p_desc; }?>" style="width: 105px;border:0px;text-align:center;background:none;font-size:15px;border: 3px solid #CCCCCC;width: 150px" readonly/></td>
    <td style="background: unset;border: 0px"><label>Product Stock:</label></td>
  <td style="background: unset;border: 0px"><input type="text" id="add_p_stock" name="add_p_stock" value="<?php if(isset($id)){echo $p_remaining; }?>" style="width: 105px;border:0px;text-align:center;background:none;font-size:15px;border: 3px solid #CCCCCC;width: 150px" readonly/></td>
  </tr>
    <tr style=" border: 0px">
    <td style="background: unset;border: 0px"><label>Product Price:</label></td>
  <td style="background: unset;border: 0px"><input type="text" id="add_p_price" name="add_p_price" value="<?php if(isset($id)){echo $p_price; }?>" style="width: 105px;border:0px;text-align:center;background:none;font-size:15px;border: 3px solid #CCCCCC;width: 150px" onchange="price_mul()" /></td>
  <td style="background: unset;border: 0px"><label>Total Price:</label></td>
  <td style="background: unset;border: 0px"><input name="TOTAL" id="TOTAL" type="text"  style="width: 105px;border:0px;text-align:center;background:none;font-size:15px;border: 3px solid #CCCCCC;width: 150px"  readonly/></td>
  <td style="background: unset;border:none"><input name="id" type="hidden" value="<?php echo $id; ?>" readonly/></td>
  <td style="background: unset;border:none"><input name="p_code" type="hidden" value="<?php echo $p_code; ?>" readonly/></td>
  </tr>
  </table>
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
    <br />
		<p style="padding-left: 520px;font-size: 30px;color: #E6A43F">New Kurta Designer</p>
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">
      <button type="submit" name="submit" class="snip1544" id="xx" disabled="">Add to Cart</button>
      
            <table id="meta" style="background-color: #fff">
                <tr>
                    <td class="meta-head">Invoice #</td>
                    <td><input type="text" name="invoice" readonly value="<?php echo $_SESSION['SESS_MEMBER_ID']; ?>"></td>
                </tr>
                <tr>

                    <td class="meta-head">Date</td>
                    <td><input type="text" name="date" readonly value="<?php echo $month_name.$da ?>"></td>
                </tr>
                <tr>
                    <td class="meta-head">Time</td>
                    <td><input type="text" name="time" id="time" readonly></td>
                </tr>

            </table>
		</form>
		</div>
		
		<table id="items" style="background-color: #fff">
		
		  <tr>
		      <th>Item</th>
		      <th>Product Code</th>
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
       echo '<input name="up_id" value="'.$row['id'].'" type="hidden">';
        echo '<td class="description"><div class="delete-wpr">'.$row['p_name'].'<a class="delete" href=delete.php?id=' . $row["id"] .'>X</a></div></td>';
        echo '<td style="padding-left:20px">'.$row['p_desc'].'</td>';
        echo '<td>'.$row['p_price'].'</td>';
        echo '<td>'.$row['p_quantity'].'</td>';
        echo '<td><div class="update-wpr">'.$row['total_price'].'<a rel="facebox" class="update" style="left:103%;padding: 0px 3px;border-radius:0;width:20px;text-align:center" href=editproduct.php?id='.$row['id'].'>+</a></div></td>';
      echo '</tr>';
    
    }

mysqli_close($con); ?>
<form action="preview.php" method="post" name="mn" id="suggestSearch">
		    <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Subtotal :</td>
		      <td class="total-value"><div id="subtotal">
            <?php
$link = mysqli_connect("localhost", "root", "", "admin");
 $f=$_SESSION['SESS_MEMBER_ID'];
 $result = mysqli_query($link,"SELECT sum(total_price) FROM sales where reciept = '$f'");

 while($row2 = mysqli_fetch_assoc($result))
   {
       $yy=$row2['sum(total_price)'];
  
     }
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
          <input type="text" name="tdiscount" id="tdiscount" style="text-align:left" value="0" readonly/> </td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Amount Due :</td>
		      <td class="total-value"><input style="background-color: unset; text-align: left;" name="gtotal" id="gtotal" size="17" readonly value="<?php echo $yy;?>"/></td>
		  </tr>
          <tr>
          <td colspan="2" class="blank"> </td>
          <td colspan="2" class="total-line">Paid Amount :</td>
          <td class="total-value"><input type="text" name="paid_amount" id="paid_amount" onkeyup="total()" style="text-align: center; border-radius: 5px;border:1px blue solid; background: #065CB7;color: white" value="0"></td>
      </tr>
          <tr>
          <td colspan="2" class="blank"> </td>
          <td colspan="2" class="total-line balance">Balance Due</td>
          <td class="total-value balance">
          <input style="text-align: center;background-color: unset;" type="text" name="total_amount" id="total_amount" value="0" readonly>
          </td>
      </tr>
		
		</table>
		
		<div id="terms">
		  <button type="submit" name="bill" class="btn btn-sm" style="margin: 0 auto">Print</button>
		</div>
	</div>
  </form>
  <div class="clearfix"></div>
</div>
<script src="js/jquery.js"></script>
</body>
</html>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>
<?php
if(isset($_POST['bill'])){
$tretail=$_POST['tretail'];
$aba=$_POST['aba'];
$tdiscount=$_POST['tdiscount'];
$gtotal=$_POST['gtotal'];
$paid_amount=$_POST['paid_amount'];
$total_amount=$_POST['total_amount'];
$insert=mysqli_query($con,"INSERT INTO bill (id,reciept_no,qty,price,discount_percantage,discount_amount,amount_due,paid_amount,balance_due)
VALUES (null,'$reciept','$Quantity','$tretail','$aba','$tdiscount','$gtotal','$paid_amount','$total_amount')");
}
?>