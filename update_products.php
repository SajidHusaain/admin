<?php include('function.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Products</title>
	<link rel="stylesheet" type="text/css" href="style.css" media="all" />
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript">
		

	</script>
	<style type="text/css">
	.chatbox{
		width:100%;
		height:100%;
	}

	.chatlogs{
		width: 100%;
		height: 100%;
		overflow-x:hidden;
		overflow-y:scroll;
	}
	.chatlogs::-webkit-scrollbar{
		width:10px;
	}
	.chatlogs::-webkit-scrollbar-thumb{
		border-radius:5px;
		background:white;
	}
	.chat{
		display: flex;
		flex-flow:  row wrap;
		align-items: flex-start;
		margin-bottom: 10px;
	}
	.chat .user-photo{
		width: 60px;
		height: 60px;
		background:  #ccc;
		border-radius: 50%;
		overflow:hidden;
	}
	.chat .user-photo img{
		width:100%;
	}
	.chat .chat-message{
		width: 80%;
		padding: 15px;
		margin: 5px 10px 0;
		/*background: #1ddced;*/
		border-radius: 10px;
		color:white;
		font-size:10px;
	}
	.friend .chat-message{
		/*background:#1adda4;*/
		font-size: 20px;
	}
	.self .chat-message{
		/*background: #1ddced;*/
		order:-1;
	}

	/*main*/

	</style>
</head>
<body>
<div class="maincontainer" style="width: 100%; height: 645px; background: Azure;">
<div style="width: 100%; height: 100%; background: black; border-radius: 10px; margin-top: 10px; color: white; margin-left: 2px;">


	<div style="width: 100%; height: 100%;  border-radius: 20px; float: left;" class="chatbox">
			<div class="chatlogs">
			<div class="chat friend">
				<table align="center" style="margin-top: 20px; font-size: 18px; text-align: center;" border="0" cellspacing="10" cellpadding="3" >
					<tr style="background-color: white; color: black ;">
						<th >PRODUCT NAME</th>
						<th>PRODUCT DESCRIPTION</th>
						<th>PRODUCT QUANTITY</th>
						<th>PRODUCT SIZE</th>
						<th>PRODUCT COLUOR</th>
						<th>PRODUCT PICTURE</th>
						<th>PRODUCT DATE</th>
						<th>UPDATE PRODUCT</th>
					</tr>
					
					<tr>
						
												<?php
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
	echo '<td><a href="update_product.php?update='.$row_run_get_record['pro_id'].'"><img src="images/update.png"/></a></td>';

	echo '</tr>';
	
		}
			?>	
					</tr>
					
					
				</table>
			</div>
			<a href="main_page.php" style="text-decoration: none;"><h3 style="color:black; margin-left: 10px;  background-color: white; width: 100px; height: 30px; padding-top: 10px; padding-left: 15px;">Go Back</h3></a>
		</div>
	</div>
</div>

</div>
</body>
</html>