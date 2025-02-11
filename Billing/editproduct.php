<?php
	include('connection.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM sales WHERE id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="css/styling.css" media="screen" rel="stylesheet" type="text/css" />
<style type="text/css">
<?php echo $row['p_name']; ?>
</style>
<form action="update_product.php" method="post" name="formmn" id="formmn">
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
Update Item<br><br>
<div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><img src="images/bag.png" width="19" height="19"></span>
              <input name="p_name" required="required" class="form-control" placeholder="Item Name..." maxlength="255" type="text" id="p_name" value="<?php echo $row['p_name']; ?>" style="text-align: left;"> 
            </div>
            </div>
             <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><img src="images/list.png" width="19" height="19"></span>
              <input name="p_desc" required="required" class="form-control" placeholder="Description..." maxlength="255" type="text" id="p_desc" value="<?php echo $row['p_desc']; ?>" style="text-align: left;"> 
            </div>
            </div>
             <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><img src="images/money.png" width="19" height="19"></span>
              <input name="p_price" required="required" class="form-control" placeholder="Unit Cost..." maxlength="255" type="text" id="p_price" onkeyup="myFunction()" value="<?php echo $row['p_price']; ?>" style="text-align: left;" > 
           </div>
            </div>
             <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><img src="images/quantity.png" width="19" height="19"></span>
              <input name="p_quantity" required="required" class="form-control" placeholder="Quantity..." maxlength="255" type="text" id="p_quantity" onkeyup="myFunction()" value="<?php echo $row['p_quantity']; ?>" style="text-align: left;"> 
           </div>
            </div>
             <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><img src="images/price.png" width="19" height="19"></span>
              <input name="total_price" required="required" class="form-control" placeholder="Price..." maxlength="255" type="text" id="total_price" value="<?php echo $row['total_price']; ?>" style="text-align: left;">
            </div>
          </div> 
          <button type="submit" name="up" class="btn btn-primary btn-center" style="margin-left:90px">Update</button>  
</div>
</form>
<script type="text/javascript">
function myFunction() {
a=Number(document.formmn.p_price.value);
b=Number(document.formmn.p_quantity.value);
c=a*b;
document.formmn.total_price.value=c;	
}
</script>
<?php
}
?>