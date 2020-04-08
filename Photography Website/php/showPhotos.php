<?php			
					$host = "localhost";
					$user = "root";
					$password = "root";
					$database = "customers";				
					
					$connect = new mysqli($host,$user,$password,$database) or die("Problem connecting.");

					if($connect->connect_error){
						die("Connection Failed: " . $connect->connect_error);
					}

					$sql = "select * from customerPhotos";
					$result = mysqli_query($connect,$sql) or die("Bad Query.");

					$result = $connect->query("SELECT * FROM customerPhotos");


				
					//while($row = $result->fetch_array())
					while($row = mysqli_fetch_array($result))
					{		
						echo "<tr>";
						echo "<td><h2>" .$row['username'] . "</h2></td>";	
						//echo "<td><h2>" .$row['image'] . "</h2></td>";

						echo '<img src="data:image/jpeg; base64, '.base64_encode($row['image']).' "width=80 height=80" />';
						echo "<td><h2><img src=test2.php?username=".$row['username']." width=80 height=80/></h2></td>";
				
						echo "</tr>";
					}
				?>