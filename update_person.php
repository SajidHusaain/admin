<?php include('function.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Person</title>
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
<div style="width: 65%; height: 100%; background: black; border-radius: 10px; margin-top: 10px; color: white; margin-left: 250px;">
	

	<div style="width:100%; height: 100%;  border-radius: 20px; float: left;" class="chatbox">
			<div class="chatlogs">
			<div class="chat friend">
				<table align="center" style="margin-top: 20px; font-size: 18px; text-align: center;" border="0" cellspacing="10" cellpadding="3" >
				<tr>
					<th>PERSON ID</th>
					<th>PERSON NAME</th>
					<th>PERSON CONTACT</th>
					<th>PERSON ADDRESS</th>
					<th>PERSON UPDATE</th>
				</tr>
						<?php
				global $link;
		$get_person="select * from add_person";
		$run_get_person=mysqli_query($link,$get_person);

		while ($row_run_get_person=mysqli_fetch_array($run_get_person)) {
		$person_id=$row_run_get_person['per_id'];
		$person_name=$row_run_get_person['per_name'];
		$person_contact=$row_run_get_person['per_contact'];
		$person_address=$row_run_get_person['per_address'];

		echo '<tr>
				<td>'.$person_id.'</td>
				<td>'.$person_name.'</td>
				<td>'.$person_contact.'</td>
				<td>'.$person_address.'</td>
				<td><a href="update.php?update='.$person_id.'"><img src="images/update.png"/></a></td>
			</tr>';
		}
				?>
				<tr>
					<td><a href="main_page.php" style="text-decoration: none; color: white;"><h3>GO BACK</h3></a></td>
				</tr>
		</div>
	</div>
</div>

</div>
</body>
</html>