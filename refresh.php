<?php
	$connect = new mysqli("localhost:3306", "root", "rootpass", "pennlabs");
	$sql = "SELECT messages, code, favorites, id FROM posts ";
	$response = $connect->query($sql);
	$code = -999;
	$random = rand(10000000000,9999999999);
	if(isset($_REQUEST['i']))
	{
		$code = $_REQUEST['i'];
	}
	if($response)
	{
		echo "<table style=\" width:100%;\"class=\"alternate\">";
		while($row = mysqli_fetch_assoc($response))
		{
			if($row['code'] == $code)
			{
				echo "<tr>";
				echo "<td style=\"width:75%; \">";
				echo $row['messages'];
				echo "</td>";
				$output = "<td>"; 
				if($row['favorites'] > -1)
				{
					$output = $output . " <i style=\"color:red\" class=\"fa fa-heart\"></i>" . "x" . $row['favorites'];
				}
				$output = $output . " <button style=\"background: #FFFFFF; border:black 1px solid\" onclick=\"favorite(" . $row['id'] . ", " . $row['favorites'] . ")\">Favorite!</button> </td>";
				echo $output;
				
				echo "</tr>";
			}
		}
		echo "</table>";
	}

?>