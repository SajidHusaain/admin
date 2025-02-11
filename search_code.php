<?php
include ("database.php"); 


function search(){
				global $link;
    		if(isset($_POST['submit-search'])){
		$search=mysqli_real_escape_string($link,$_POST['search']);
		$from=mysqli_real_escape_string($link,$_POST['from']);
		$to=mysqli_real_escape_string($link,$_POST['to']);
		$sql="SELECT * FROM add_person_record WHERE (person_name='$search') AND (date BETWEEN '$from' AND '$to')";
		$result=mysqli_query($link,$sql);
		$queryresult=mysqli_num_rows($result);
		echo "There are ".$queryresult."results!";
		
		if($queryresult > 0)
		{
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
		else{
			echo "There are no results matching your search!";
		}	
	}
}

?>