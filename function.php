<?php
include ('database.php');
//get person record
function getrecord()
{
    global $link;
    if (!isset($_GET['person']))
    {
    	
    
	$get_record="select * from add_person_record";
	$run_get_record=mysqli_query($link,$get_record);
	while ($row_run_get_record=mysqli_fetch_array($run_get_record))
	{
	echo '<tr>';
	//echo '<td>'.$row_run_get_record['id'].'</td>';
	echo '<td>'.$row_run_get_record['person_name'].'</td>';
	echo '<td>'.$row_run_get_record['product'].'</td>';
   	echo '<td>'.$row_run_get_record['t_amount'].'</td>';
	echo '<td>'.$row_run_get_record['amount_memo'].'</td>';
	echo '<td>'.$row_run_get_record['cheque_no'].'</td>';
	echo '<td>'.$row_run_get_record['p_amount'].'</td>';
	echo '<td>'.$row_run_get_record['d_amount'].'</td>';
	echo '<td>'.$row_run_get_record['date'].'</td>';

	echo '</tr>';
		}
		
		global $link;
	$add='SELECT SUM(t_amount),SUM(p_amount),SUM(d_amount) from add_person_record';
	$run_add=mysqli_query($link,$add);
while($row=mysqli_fetch_array($run_add))
{
	$total_amount=$row['SUM(t_amount)'];
	$paid_amunt=$row['SUM(p_amount)'];
	$due_amount=$row['SUM(d_amount)'];
	}
	echo '<tr style="text-align:center;">

	<td></td>
	
	
	<td style="color:black; background:white;">Total:</td>
	<td style="color:black; background:white;">'.$total_amount.'</td>
	<td></td>
	<td></td>
	<td style="color:black; background:white;">'.$paid_amunt.'</td>
	<td style="color:black; background:white;">'.$due_amount.'</td>
	</tr>';
	}
	

}
//get person record end


function getpersonrecord()
{
   /* global $link;
    if (isset($_GET['person']))
    {
    	
    $get_person_id=$_GET['person'];
	$get_record="select SUM(t_amount),person_name,product,amount_memo,cheque_no,p_amount,d_amount ,date from add_person_record where person_id='$get_person_id'";
	$run_get_record=mysqli_query($link,$get_record);
	while ($row_run_get_record=mysqli_fetch_array($run_get_record))
	{
	echo '<tr>';
	//echo '<td>'.$row_run_get_record['id'].'</td>';
	echo '<td>'.$row_run_get_record['person_name'].'</td>';
	echo '<td>'.$row_run_get_record['product'].'</td>';
   	//echo '<td>'.$row_run_get_record['t_amount'].'</td>';
   	echo '<td>'.$row_run_get_record['SUM(t_amount)'].'</td>';
	echo '<td>'.$row_run_get_record['amount_memo'].'</td>';
	echo '<td>'.$row_run_get_record['cheque_no'].'</td>';
	echo '<td>'.$row_run_get_record['p_amount'].'</td>';
	echo '<td>'.$row_run_get_record['d_amount'].'</td>';
	echo '<td>'.$row_run_get_record['date'].'</td>';
	
	echo '</tr>';
	echo '<tr style="text-align:center;">

	<td></td>
	
	
	<td style="color:black; background:white;">Total:</td>
	<td style="color:black; background:white;">'.$row_run_get_record['SUM(t_amount)'].'</td>
	<td></td>
	
	</tr>';
		}
	
	}*/

if (isset($_GET['person']))
    {
    	global $link;
    $get_person_id=$_GET['person'];
	@$get_record="select * from add_person_record where person_id='$get_person_id'";
	$run_get_record=mysqli_query($link,$get_record);
	while ($row_run_get_record=mysqli_fetch_array($run_get_record))
	{
	echo '<tr>';
	//echo '<td>'.$row_run_get_record['id'].'</td>';
	echo '<td>'.$row_run_get_record['person_name'].'</td>';
	echo '<td>'.$row_run_get_record['product'].'</td>';
   	echo '<td>'.$row_run_get_record['t_amount'].'</td>';
	echo '<td>'.$row_run_get_record['amount_memo'].'</td>';
	echo '<td>'.$row_run_get_record['cheque_no'].'</td>';
	echo '<td>'.$row_run_get_record['p_amount'].'</td>';
	echo '<td>'.$row_run_get_record['d_amount'].'</td>';
	echo '<td>'.$row_run_get_record['date'].'</td>';
	
		}

		global $link;
	$add="select SUM(t_amount),SUM(p_amount),SUM(d_amount) from add_person_record where person_id='$get_person_id'";
	$run_add=mysqli_query($link,$add);
while($row=mysqli_fetch_array($run_add))
{
	$total_amount=$row['SUM(t_amount)'];
	$paid_amunt=$row['SUM(p_amount)'];
	$due_amount=$row['SUM(d_amount)'];
	}
	echo '<tr style="text-align:center;">

	<td></td>
	
	
	<td style="color:black; background:white;">Total:</td>
	<td style="color:black; background:white;">'.$total_amount.'</td>
	<td></td>
	<td></td>
	<td style="color:black; background:white;">'.$paid_amunt.'</td>
	<td style="color:black; background:white;">'.$due_amount.'</td>
	</tr>';
	
	}

	
}

function getperson()
{


		global $link;
		$get_person="select * from add_person";
		$run_get_person=mysqli_query($link,$get_person);

		while ($row_run_get_person=mysqli_fetch_array($run_get_person)) {
		$person_id=$row_run_get_person['per_id'];
		$person_name=$row_run_get_person['per_name'];
		echo "<li><a style='color:inherit; text-decoration:none;' href='view_person.php?person=$person_id'><h3>$person_name</h3></a></li>";
	}
}



//get category
function getcategory()
{

				global $link;
				$get_cat="select *from category";
				$run_get_cat=mysqli_query($link,$get_cat);
				while ($row_run_get_cat=mysqli_fetch_assoc($run_get_cat)) {
					$get_cat_id=$row_run_get_cat['c_id'];
					$get_cat_name=$row_run_get_cat['c_name'];
					echo "<li type='square'><a style='color:inherit; text-decoration:none;' href='view_products.php?cat=$get_cat_id'><h3>$get_cat_name</h3></a></li>";
				}
				
}
//get category



//view products
function getproducts(){

	global $link;
	if (!isset($_GET['cat']))
    {
	$get_record="select * from products";
	$run_get_record=mysqli_query($link,$get_record);
	while ($row_run_get_record=mysqli_fetch_array($run_get_record))
	{
	echo '<tr>';
	//echo '<td>'.$row_run_get_record['id'].'</td>';
	echo '<td>'.$row_run_get_record['pro_name'].'</td>';
	echo '<td>'.$row_run_get_record['pro_desc'].'</td>';
   	echo '<td>'.$row_run_get_record['pro_qty'].'</td>';
	echo '<td>'.$row_run_get_record['pro_size'].'</td>';
	echo '<td>'.$row_run_get_record['pro_color'].'</td>';
	echo '<td><img src="'.$row_run_get_record['pro_pic'].'" style="width:130px; height:150px;"/></td>';
	echo '<td>'.$row_run_get_record['pro_date'].'</td>';

	echo '</tr>';
	
		}
	}
	

}


function getcatproducts(){

	global $link;
	if (isset($_GET['cat']))
    {
    	$get_cat_id=$_GET['cat'];
	$get_record="select * from products where c_id='$get_cat_id'";
	$run_get_record=mysqli_query($link,$get_record);
	while ($row_run_get_record=mysqli_fetch_array($run_get_record))
	{
	echo '<tr>';
	//echo '<td>'.$row_run_get_record['id'].'</td>';
	echo '<td>'.$row_run_get_record['pro_name'].'</td>';
	echo '<td>'.$row_run_get_record['pro_desc'].'</td>';
   	echo '<td>'.$row_run_get_record['pro_qty'].'</td>';
	echo '<td>'.$row_run_get_record['pro_size'].'</td>';
	echo '<td>'.$row_run_get_record['pro_color'].'</td>';
	echo '<td><img src="'.$row_run_get_record['pro_pic'].'" style="width:130px; height:150px;"/></td>';
	echo '<td>'.$row_run_get_record['pro_date'].'</td>';

	echo '</tr>';
	
		}
	}

}

//view products


/*function add_person_sum(){

global $link;
	$add='SELECT SUM(t_amount),SUM(p_amount),SUM(d_amount) from add_person_record';
	$run_add=mysqli_query($link,$add);
while($row=mysqli_fetch_array($run_add))
{
	$total_amount=$row['SUM(t_amount)'];
	$paid_amunt=$row['SUM(p_amount)'];
	$due_amount=$row['SUM(d_amount)'];
	}
	echo '<tr style="text-align:center;">

	<td></td>
	
	
	<td style="color:black; background:white;">Total:</td>
	<td style="color:black; background:white;">'.$total_amount.'</td>
	<td></td>
	<td></td>
	<td style="color:black; background:white;">'.$paid_amunt.'</td>
	<td style="color:black; background:white;">'.$due_amount.'</td>
	</tr>';

}*/

/*function get_sum()
{
	global $link;
	if (isset($_GET['person'])) {
		$id=$_GET['person'];
	
	$total_sum=0;
	$sel_sum="select * from add_person where person_id='$id' ";
	$run_sel_sum=mysqli_query($link,$sel_sum);
	while ($record=mysqli_fetch_array(@$run_sel_sum)) {

		$person_id=$record['id'];
		$per_sum="select *from add_person_record where id='$person_id' ";
		$run_per_sum=mysqli_query($link,$per_sum);
		while ($s_person=mysqli_fetch_array($run_per_sum)) {
			$total_amount = array($s_person['t_amount'] );
			$values=array_sum($total_amount);
			$total_amount_sum=$total_amount+$values;
		}
		
	}
	echo "<h3 style='color:white;'>'.$total_sum.'</h3>";
	}
}*/

?>