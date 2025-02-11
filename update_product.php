<?php

session_start();
include("database.php");

/*fetch Record*/
if(isset($_GET['update']))
{
	global $link;
$edit_record=$_GET['update'];
$Query='select *from products where pro_id="'.$edit_record.'"';
$run=mysqli_query($link,$Query);
while ($row = mysqli_fetch_array($run))
{
	$edit_id=$row['pro_id'];
	$product_name=$row['pro_name'];
	$product_desc=$row['pro_desc'];
	$product_qty=$row['pro_qty'];
	$product_size=$row['pro_size'];
	$product_color=$row['pro_color'];
	$product_pic=$row['pro_pic'];
	$product_date=$row['pro_date'];
}
}
/*fetch Record*/

/*update products*/
if(isset($_POST['update_product']))
{
$edit_record1=$_GET['edit_form'];

$u_products_name=$_POST['u_p_name'];
$u_products_desc=$_POST['u_product_desc'];
$u_products_qty=$_POST['u_pro_qty'];
$u_products_size=$_POST['u_size'];
$u_products_color=$_POST['u_color'];
$u_products_date=$_POST['u_date'];
	@$file = $_FILES['file'];
	$fileName = $file['name'];
	$fileTmpName = $file['tmp_name'];
	$fileSize = $file['size'];
	$fileError = $file['error'];
	$fileType = $file['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg', 'jpeg', 'png', 'pdf');

	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
			if ($fileSize < 1000000) {
				$fileNameNew = uniqid('', true).".".$fileActualExt;
				$fileDestination = 'uploaded_images/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);

				$query1='UPDATE products SET pro_name="'.$u_products_name.'",pro_desc="'.$u_products_desc.'",pro_qty="'.$u_products_qty.'",pro_size="'.$u_products_size.'",pro_color="'.$u_products_color.'",pro_pic="'.$fileDestination.'",pro_date="'.$u_products_date.'" WHERE pro_id="'.$edit_record1.'"';
	if(mysqli_query($link,$query1)){
		
		echo '<script>alert("Record Has Been Updated Successfully")</script>';
		header("Location:update_products.php");
		}
		else{
			echo '<script>window.open(update_product.php?update=your record has been not updated!","_self")</script>';
		}
}
}}}

/*end update products*/

?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Product</title>
	<link rel="stylesheet" type="text/css" href="style.css" media="all" />
	<link rel="stylesheet" type="text/css" href="design.css" media="all" />
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript">
		

	</script>
		</script>
	<script type="text/javascript" src="si.files.js"></script>
<script type="text/javascript">
SI.Files.stylizeAll()
</script>

<style type="text/css">
.style-chosen label.cabi
{
	margin:0 auto;
	color: white;
    width: 150px;
    height: 80px;
    background:url(files.png) 0 0 no-repeat;
    display: block;
    overflow: hidden;
    cursor: pointer;
}

.style-chosen label.cabi .file
{
    position: relative;
    height: 100%;
    width: auto;
    opacity: 0;
	cursor:pointer;
    -moz-opacity: 0;
}
</style>
</head>
<body>

<div class="maincontainer" style="width: 100%; height: 770px; background: Azure;">
<div style="width: 95%; height: 770px; background: black; border-radius: 20px; margin-top: 10px; color:white; margin:0 auto">
	<h1 style="text-align: center;">UPDATE PRODUCTS</h1>
<div style="width: 100%; height:700px;  float: left;">
		<form method="post" action="update_product.php?edit_form=<?php echo $edit_id;?>" enctype="multipart/form-data">
	<table cellpadding="30" cellspacing="15">
		<tr>
			<td style="font-weight: bold;">Update Product Name:</td>
			<td><input type="text" name="u_p_name" id="p_name" value="<?php echo $product_name;?>"></td>
			<td style="font-weight: bold;">Update Product Description:</td>
			<td><input type="text" name="u_product_desc" id="product_desc" value="<?php echo $product_desc;?>"></td>
		</tr>
		<tr>
			<td style="font-weight: bold;">Update Product Quantity:</td>
			<td><input type="text" name="u_pro_qty" id="pro_qty" value="<?php echo $product_qty;?>"></td>
			<td style="font-weight: bold;">Update Size:</td>
			<td><input type="text" name="u_size" value="<?php echo $product_size;?>"></td>
		</tr>
			<tr>
			
			<td style="font-weight: bold;">Update Product Color</td>
			<td><input type="text" name="u_color" value="<?php echo $product_color;?>"></td>
			<td style="font-weight: bold;">Update Product Picture:</td>
			<td><label class="cabi"> 
			<input type="file" class="file" name="file" value="<?php echo $product_pic;?>"  />
			</label></td>
			
			
		</tr>
		<tr>
			
			<td style="font-weight: bold;">Update Date:</td>
			<td><input type="date" name="u_date" id="date"  value="<?php echo $product_date;?>" style="   width: 100%; padding: 12px 20px;margin: 8px 0;box-sizing: border-box;height: 40px;color:black;font-weight: bold;border-radius: 5px; border: none;"></td>
			<td colspan=""></td>
			<td><div class="tooltip"><input type="submit" name="update_product"  value="Update Products"><span class="tooltiptext">Click Now</span></div></td>
		</tr>
		<tr>
			
			<td><a href="main_page.php" style="text-decoration: none; color:white;"><h3>GO BACK</h3></a></td>
			
		</tr>
		<tr></tr>

	</table>
	</form> 
</div>
</div>
</div>
</body>
</html>