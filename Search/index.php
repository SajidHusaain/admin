<?php
include 'header.php';
?>
<form action="search.php" method="post">
<input type="text" name="search" placeholder="Search..." />
<label style="font-size:25px">From:</label>
<input type="date" name="from">
<label style="font-size:25px">To:</label>
<input type="date" name="to">
<button type="submit" name="submit-search">Search</button>	
</form>
<h1>Front Page</h1>
<h2>All Products</h2>
<div class="article-container">
<?php
	$sql="select * from add_person_record";
	$result= mysqli_query($mysqli,$sql);	
	$queryresult=mysqli_num_rows($result);
	//if($queryresult>0){
		//while($row=mysqli_fetch_assoc($result)){
			echo "<div class='article-box'>
			<h3>".$row['person_name']."</h3>
			<p>".$row['product']."</p>
			<p>".$row['t_amount']."</p>	
			<p>".$row['p_amount']."</p>
			<p>".$row['date']."</p>
			</div>";
		//}
	//}
?>
</div>
</body>
</html>