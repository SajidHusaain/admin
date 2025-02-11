<?php
include 'header.php';
?>
<h1>Product Page</h1>
<div class="article-container">
<?php
	$title=mysqli_real_escape_string($mysqli,$_GET['title']);
	$date=mysqli_real_escape_string($mysqli,$_GET['date']);
	$sql="select * from product where p_name='$title' and p_manufactur_date='$date'";
	$result= mysqli_query($mysqli,$sql);	
	$queryresult=mysqli_num_rows($result);
	if($queryresult>0){
		while($row=mysqli_fetch_assoc($result)){
			echo "<div class='article-box'>
			<h3>".$row['p_name']."</h3>
			<p>".$row['p_desc']."</p>
			<p>".$row['p_price']."</p>	<p>".$row['p_manufactur_date']."</p>
			<p>".$row['p_expire_date']."</p>
			</div>";
		}
	}
?>
</div>
</body>
</html>