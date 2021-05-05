
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Charging Station</title>
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<style>
input[type=number], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  width: 50%;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>

</head>
<body>
<center>
<h1>Visitors Prediction System</h1>
<div>
<form action="insert.php" method="post">
    <p>
        <label for="no_of_visitors">Number of Visitors:</label>
        <input type="number" name="no_of_visitors" id="no_of_visitors">
    </p>
    <p>
		<label for="working_time">Working Hours:</label>
		<input type="number" id="working_time" name="working_time" required> 
	</p>
    <p>
        <label for="no_of_ports">Number of Ports:</label>
		<input type="number" id="no_of_ports" name="no_of_ports" required>
	</p>
    <p>
		<label for="power_consumption">Power Available:</label>
		<input type="number" id="power_consumption" name="power_consumption" required>
	</p>
	<p>
		<label for="parking_slots">Parking Lots:</label>
		<input type="number" id="parking_slots" name="parking_slots" required>
	</p>
    <input type="submit" value="Submit"><br><br><br>

	 <?php  if($_GET["submitted"]){ ?> 
	 <h3>Predicted Value: 	
	 <?php  
	 $connect = mysqli_connect("localhost", "root", "Admin@123", "EV");  
	 $sql = "SELECT accommodable_visitors FROM day_base_visitor_predict  ORDER BY id DESC  LIMIT 1";  
	 $result = mysqli_query($connect, $sql);  
	 $rows = mysqli_num_rows($result);
	 if($rows > 0)  
	 {  

		  while($row = mysqli_fetch_array($result))  
		  {  
			echo  $row["accommodable_visitors"];
		  }  
	 }
	 else  
	 {  
		   echo  " No Sufficient Data to get the Predictions";
	 }
	?>
	</h3>

	<?php } ?>
</form>
</div>
</center>
</body>
</html>