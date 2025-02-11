<?php
session_start();
if(isset($_SESSION['name'])){

}else{
	header("location:index.php");
}

include ("search_code.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
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

<div style="width: 90%; height: 80px; background: black; border-radius: 20px; color:white; margin-left: 65px;">
<form method="post" action="search.php">
<table style="padding-top: 10px; width: 90%; margin-left: 60px;" >
<tr>
<td><input type="text" name="search" placeholder="Search..." style="width: 200px;" /></td>
<td><label style="font-size:25px">From:</label>
<input type="date" name="from"  style="width: 200px;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    height: 40px;
    color: black;
    font-weight: bold;
    border-radius: 5px;"></td>
<td><label style="font-size:25px">To:</label>
<input type="date" name="to" style="width: 200px;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    height: 40px;
    color: black;
    font-weight: bold;
    border-radius: 5px;"></td>
<td><button type="submit" name="submit-search" style="width: 200px;
    background-color:white;
    height: 40px;
    border: none;
    color: black;
    font-weight: bold;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 5px; ">Search</button></td>	
</tr>
</table>
</form>
</div>

<div style="width: 100%; height: 85%; background: black; border-radius: 10px; margin-top: 10px; color: white; margin-left: 2px;">
	

	<div style="width: 100%; height: 100%;  border-radius: 20px; float: left;" class="chatbox">
			<div class="chatlogs">
			<div class="chat friend">
				<table align="center" style="margin-top: 20px; font-size: 18px; text-align: center;" border="0" cellspacing="10" cellpadding="3" >
					
					<tr style="background-color: white; color: black ;">
						<th >NAME</th>
						<th>PRODUCTS</th>
						<th>TOTAL AMOUNT</th>
						<th>AMOUNT MEMO</th>
						<th>CHEQUE NUMBER</th>
						<th>PAID AMOUNT</th>
						<th>DUE AMOUNT</th>
						<th>DATE</th>
					</tr>
					
						<?php
if (!isset($_POST['submit-search'])) {
	# code...

	$sql="select * from add_person_record";
	$result= mysqli_query($link,$sql);	
	$queryresult=mysqli_num_rows($result);
	if($queryresult>0){
		while($row=mysqli_fetch_assoc($result)){
			echo "<tr>
			<td>".$row['person_name']."</td>
			<td>".$row['product']."</td>
			<td>".$row['t_amount']."</td>	
			<td>".$row['amount_memo']."</td>
			<td>".$row['cheque_no']."</td>
			<td>".$row['p_amount']."</td>
			<td>".$row['d_amount']."</td>
			<td>".$row['date']."</td>
			</tr>";
		}
	}
	}
		?>
		<tr>
		<?php search();?>
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