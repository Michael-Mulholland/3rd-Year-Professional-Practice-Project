<html>
	<head>
		<title>Php Picture Table Example</title>
	</head>	
	<body>

		
		
		<table border="1">
			<tr>
				<td><h2>patient_id</h2></td>
				<td><h2>title</h2></td>
				<td><h2>first_name</h2></td>
				<td><h2>surname</h2></td>
				<td><h2>payment_date</h2></td>
				<td><h2>bill_cost</h2></td>
				<td><h2>appointment_id</h2></td>
				<td><h2>bill_status</h2></td>	
				<td><h2>picture</h2></td>	
				<td><h2>picture_path</h2></td>
			</tr>
			<?php			
				$host = "localhost";
				$user = "root";
				$password = "root";
				$database = "customers";				
				
				$query = "select cp.image
							from customerPhotos cp join login_details ld
							on cp.username = ld.username;";
				$connect = mysqli_connect($host,$user,$password,$database) or die("Problem connecting.");
				$result = mysqli_query($connect,$query) or die("Bad Query.");
				mysqli_close($connect);

				while($row = $result->fetch_array())
				{		
					echo "<tr>";
					echo "<td><h2><img src=test2.php?username=".$row['username']." width=80 height=80/></h2></td>";
				    echo "</tr>";
				}
			?>

		<table>
	</body>
</html>


