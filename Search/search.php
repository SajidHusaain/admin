<?php
include 'header.php';
?>
<h1>Search Page</h1>
<div class="article-container">
<?php
	/*if(isset($_POST['submit-search'])){
		$search=mysqli_real_escape_string($mysqli,$_POST['search']);
		$from=mysqli_real_escape_string($mysqli,$_POST['from']);
		$to=mysqli_real_escape_string($mysqli,$_POST['to']);
		if($search!=null){
		$sql="select * from  add_person_record where person_name like '%$search%' ";
		$result=mysqli_query($mysqli,$sql);
		$queryresult=mysqli_num_rows($result);
		echo "There are ".$queryresult."results!";
		
		if($queryresult > 0)
		{
			while($row=mysqli_fetch_assoc($result)){
			echo "<a href='article.php?id=".$row['id']."'><div class='article-box'>
			<h3>".$row['person_name']."</h3>
			<p>".$row['product']."</p>
			<p>".$row['p_amount']."</p>	
			<p>".$row['t_amount']."</p>
			<p>".$row['date']."</p>
			</div></a>";
		}
		}else{
			echo "There are no results matching your search!";
		}	
		}
		if($search == null){
		$sql2="select * from  add_person_record where date between '$from' and '$to' ";
		$result2=mysqli_query($mysqli,$sql2);
		$queryresult2=mysqli_num_rows($result2);
		echo "There are ".$queryresult2."results!";
		
		if($queryresult2 > 0)
		{
			while($row=mysqli_fetch_assoc($result2)){
			echo "<a href='article.php?id=".$row['id']."'><div class='article-box'>
			<h3>".$row['person_name']."</h3>
			<p>".$row['product']."</p>
			<p>".$row['p_amount']."</p>	
			<p>".$row['t_amount']."</p>
			<p>".$row['date']."</p>
			</div></a>";
		}
		}else{
			echo "There are no results matching your search!";
		}	
		}
	}*/
	$get_record="select * from add_person_record";
	global $mysqli;
	$run_get_record=mysqli_query($mysqli,$get_record);
	while ($row_run_get_record=mysqli_fetch_array($run_get_record))
	{
	
	if(isset($_POST['submit-search'])){
		$name=$row_run_get_record['person_name'];
		global $mysqli;
		$search=mysqli_real_escape_string($mysqli,$_POST['search']);
		$from=mysqli_real_escape_string($mysqli,$_POST['from']);
		$to=mysqli_real_escape_string($mysqli,$_POST['to']);
		if ($search==$name) {
			global $mysqli;
			$sql2="select * from  add_person_record where date between '$from' and '$to' ";
		$result2=mysqli_query($mysqli,$sql2);
		$queryresult2=mysqli_num_rows($result2);
		echo "There are ".$queryresult2."results!";
		
		if($queryresult2 > 0)
		{
			while($row=mysqli_fetch_assoc($result2)){
			echo "<a href='article.php?id=".$row['id']."'><div class='article-box'>
			<h3>".$row['person_name']."</h3>
			<p>".$row['product']."</p>
			<p>".$row['p_amount']."</p>	
			<p>".$row['t_amount']."</p>
			<p>".$row['date']."</p>
			</div></a>";
		}
		}else{
			echo "There are no results matching your search!";
		}	
		}
	}

	}
?>
</div>