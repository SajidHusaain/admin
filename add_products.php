<?php

session_start();
include("database.php");
if(isset($_SESSION['name'])){

}else{
	header("location:index.php");
}
//insert products

?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
	<link rel="stylesheet" type="text/css" href="style.css" media="all" />
	<link rel="stylesheet" type="text/css" href="design.css" media="all" />
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript">
		

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
	<h1 style="text-align: center;">ADD PRODUCTS</h1>
<div style="width: 100%; height:700px;  float: left;">
		<form method="post" enctype="multipart/form-data" action="add_products.php" name="insert_products">
	<table cellpadding="30" cellspacing="15">
		<tr>
			<td style="font-weight: bold;">Select Category Name:</td>
			<td><select name="add_category" style="  width: 100%; padding: 12px 20px;margin: 8px 0;box-sizing: border-box;height: 40px;color:black;font-weight: bold;border-radius: 5px; border: none;">
				<option value="Select Category" selected disabled="">Select Category</option>
				<?php
				include ('database.php');
				global $link;
				$get_cat="select *from category";
				$run_get_cat=mysqli_query($link,$get_cat);
				while ($row_run_get_cat=mysqli_fetch_assoc($run_get_cat)) {
					$get_cat_id=$row_run_get_cat['c_id'];
					$get_cat_name=$row_run_get_cat['c_name'];
					echo "<li><option value='".$get_cat_id."'>$get_cat_name</option></li>";
				}
				?>
			</select></td>
			<td style="font-weight: bold;">Enter Product Name:</td>
			<td><input type="text" name="pro_name" id="pro_name" placeholder="Enter Product Name....." required></td>
		</tr>
		<tr>
			
			<td style="font-weight: bold;">Enter Product Code:</td>
			<td><input type="text" name="pro_code" id="pro_code" placeholder="Enter Product Code....." required></td>
			<td style="font-weight: bold;">Enter Product Quantity:</td>
			<td><input type="text" name="pro_qty" id="pro_qty" placeholder="Enter Product Quantity....." required></td>
			
		</tr>
			<tr>
			<td style="font-weight: bold;">Select Size:</td>
			<td><select name="pro_size" style="  width: 100%; padding: 12px 20px;margin: 8px 0;box-sizing: border-box;height: 40px;color:black;font-weight: bold;border-radius: 5px; border: none;">
				<option  selected disabled>Select Any Option</option>
				<option>SMALL</option>
				<option>MEDIUM</option>
				<option>LARGE</option>
				<option>EXTRA LARGE</option>
				<option>19 Size</option>
				<option>20 Size</option>
				<option>21 Size</option>
				<option>23 Size</option>
				<option>24 Size</option>
			</select></td>
			<td style="font-weight: bold;">Enter Product Color</td>
			<td><input type="text" name="pro_colors" id="pro_colors"  required style=" width: 100%; padding: 12px 20px; margin: 8px 0;   box-sizing: border-box;height: 40px;border-radius: 5px; " placeholder="Enter Color Name..."></td>
			
			
			
		</tr>
		<tr>
			<td style="font-weight: bold;">Choose Product Picture:</td>
			<td><label class="cabi"> 
			<input type="file" class="file" name="pro_image"  />
			</label></td>
			<td style="font-weight: bold;">Current Date:</td>
			<td><input type="date" name="pro_date" id="pro_date" placeholder="Select Current Date....." required style="   width: 100%; padding: 12px 20px;margin: 8px 0;box-sizing: border-box;height: 40px;color:black;font-weight: bold;border-radius: 5px; border: none;"></td>
			
		</tr>
		<tr>
			<td style="font-weight: bold;">Product Buying Price:</td>
			<td><input type="text" name="p_b_price" id="p_b_price" placeholder="Enter Product Price....." required></td>
			<td style="font-weight: bold;">Product Selling Price:</td>
			<td><input type="text" name="p_s_price" id="p_s_price" placeholder="Enter Product Price....." required></td>
		</tr>
		<tr>
			<td><div class="tooltip"><input type="submit" name="add_products" id="add_products" value="Add Products"><span class="tooltiptext">Click Now</span></div></td>
			<td><a href="main_page.php" style="text-decoration: none; color:white;"><h3>GO BACK</h3></a></td>
			
		</tr>
		<tr></tr>

	</table>
	</form> 
</div>
</div>
</div>
</body>

<?php
/*if (isset($_POST['add_products'])) {

$uploaded_img_size_limit=778240;
$products_name=$_POST['pro_name'];
$products_desc=$_POST['pro_desc'];
$products_qty=$_POST['pro_qty'];
$products_size=$_POST['pro_size'];
$products_color=$_POST['pro_colors'];
$products_img_name=time().'_'.$_FILES['pro_image']['name'];
$products_img_tmp_name=$_FILES['pro_image']['tmp_name'];
$products_img_size=$_FILES['pro_image']['size'];
$products_img_type=$_FILES['pro_image']['type'];
$products_date=$_POST['pro_date'];

if($products_img_size > $uploaded_img_size_limit){
			echo "<script>alert('Image 1 size Must be Equal or Less than 756KB');</script>";
		exit();
			}

			if($products_img1_type != 'image/jpeg' 
			&& $users_picture_type != 'image/jpg' 
			&& $users_picture_type != 'image/gif'
			&& $users_picture_type != 'image/png'){
	echo "<script>alert('Please Upload Only Image File In Image 1');</script>";
		exit();
	}



}
else
	{
		$uploaded_images_dir="uploaded_images/";
		move_uploaded_file($product_img_tmp_name,$uploaded_images_dir.$product_img_name);
		$add_product="INSERT INTO products(c_id, pro_name, pro_desc, pro_qty, pro_size, pro_color, pro_pic, pro_date) VALUES ('$add_category','$products_name','$products_desc','$products_qty','$products_size','$products_color','$products_img_name','$products_date')";
	
	global $link;
	$run_add_product=mysqli_query($link,$add_product);
	if($run_add_product)
	
		{
			echo "<script>alert('Product has benn Uploaded and Added');</script>";
		exit();
		}	

	}*/

// if (isset($_POST['add_products'])) {

// $products_name=$_POST['pro_name'];
// $products_desc=$_POST['pro_desc'];
// $products_qty=$_POST['pro_qty'];
// $products_size=$_POST['pro_size'];
// $products_color=$_POST['pro_colors'];
// $add_categories=$_POST['add_category'];

// /*$file = $_FILES['file'];
// $fileName = $_FILES['file']['name'];
// $fileTmpName = $_FILES['file']['tmp_name'];
// $fileSize = $_FILES['file']['size'];
// $fileError = $_FILES['file']['error'];
// $fileType = $_FILES['file']['type'];
// $fileExtension = explode('.',$fileName);
// $fileActualExtension =strtolower(end($fileExtension));
// $allowed = array('jpg','jpeg','png','gif');*/
// $products_date=$_POST['pro_date'];
// $pro_image=$link->real_escape_string('uploaded_images/'.$_FILES['pro_image']['name']);
// if(preg_match("!image!",$_FILES['pro_image']['type'])){
//  if(copy($_FILES['pro_image']['tmp_name'],$pro_image)){
//    $add_product="INSERT INTO products(c_id, pro_name, pro_desc, pro_qty, pro_size, pro_color, pro_pic, pro_date) VALUES ('$add_categories','$products_name','$products_desc','$products_qty','$products_size','$products_color','$pro_image','$products_date')";
 
//  global $link;
//  $run_add_product=mysqli_query($link,$add_product);
//  if($run_add_product)
 
//   {
//    echo "<script>alert('Product has benn Uploaded and Added');</script>";
//    header("Location:add_products.php?uploadsuccess");
//   } 
//  }
// }
// }
/*if(in_array($fileActualExtension,$allowed)){
if($fileError === 0){
 if($fileSize < 1000000){
  $fileNameNew = uniqid('',true).'.'.$fileActualExtension;
  $fileDestination = 'uploaded_images/'.$fileNameNew;
  move_uploaded_file($fileTmpName,$fileDestination);
  
  }else{
   echo "<script>alert('Yorur File Is Too Big!');</script>";
  } 

 }else{
echo "<script>alert('There Was An Error Uploading Your File!');</script>";
 }
}else{
  echo "<script>alert('You Can not Upload Files of this Type!');</script>";
}
 }*/
 if (isset($_POST['add_products'])) {

$products_name=$_POST['pro_name'];
$products_code=$_POST['pro_code'];
$products_qty=$_POST['pro_qty'];
$products_size=$_POST['pro_size'];
$products_color=$_POST['pro_colors'];
$products_buying_price=$_POST['p_b_price'];
$products_selling_price=$_POST['p_s_price'];
$add_categories=$_POST['add_category'];
$products_date=$_POST['pro_date'];
	$file = $_FILES['pro_image'];
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
$add_product="INSERT INTO productlist(id,p_code,p_name,pro_code,p_color,p_single_piece_cost,p_remaining,p_price,p_size,p_pic,p_date) VALUES (null,'$add_categories','$products_name','$products_code','$products_color','$products_buying_price','$products_qty','$products_selling_price','$products_size','$fileDestination','$products_date')";
 
 global $link;
 $run_add_product=mysqli_query($link,$add_product);
 if($run_add_product)
 
  {
  	//header("Location:add_products.php?uploadsuccess");
   echo "<script>alert('Product has benn Uploaded and Added');</script>";
   
  } 
  			} else {
  				//header("Location:add_products.php?error");
				echo "<script>alert('Your file is too big!');</script>";
				
			}
		} else {
			//header("Location:add_products.php?error");
			echo "<script>alert('There was an error uploading your file!')</script>";
			
		}
	} else {
		//header("Location:add_products.php?error");
		echo "<script>alert('You cannot upload files of this type!')</script>";
		
	}
}

?>