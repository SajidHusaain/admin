<?php include('function.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>UpdateOrDelete</title>
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
<div style="width: 70%; height: 100%; background: black; border-radius: 10px; margin-top: 10px; color: white; margin-left: 220px;">
	

	<div style="width: 100%; height: 100%;  border-radius: 20px; float: left;" class="chatbox">
			<div class="chatlogs">
			<div class="chat friend">
				<table align="center" style="margin-top: 20px; font-size: 18px; text-align: center;" border="0" cellspacing="10" cellpadding="3" >
					<tr style="background-color: white; color: black ;">
						<th > CATEGORY ID</th>
						<th >CATEGORY NAME</th>
						<th>UPDATE CATEGORY</th>
						<th>DELETE CATEGORY</th>
					</tr>
					<?php  
					global $link;
    		$get_cat="select * from category";
			$run_get_cat=mysqli_query($link,$get_cat);
			while ($row_run_get_cat=mysqli_fetch_array($run_get_cat))
				{
					$id=$row_run_get_cat['c_id'];
		echo '<tr>';
		echo '<td>'.$row_run_get_cat['c_id'].'</td>';
		echo '<td>'.$row_run_get_cat['c_name'].'</td>';
		
		echo '<td><a href="update_cat.php?update='.$id.'"><img src="images/update.png"/></a></td>';
		echo '<td><a href="delete_cat.php?del_cat='.$id.'"><img src="images/delete.png"/></a></td>';
		echo '</tr>';
		}
	 ?>
								
					
				</table>
			</div>
			<a href="main_page.php" style="text-decoration: none;"><h3 style="color:black; margin-left: 10px;  background-color: white; width: 100px; height: 30px; padding-top: 10px; padding-left: 15px;">Go Back</h3></a>
		</div>
	</div>
</div>

</div>
</body>
</html>