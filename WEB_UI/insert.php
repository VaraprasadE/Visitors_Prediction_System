<?php  
$connect = mysqli_connect("localhost", "root", "Admin@123", "EV");
$sql = "INSERT INTO `EV`.`day_base_visitor_predict` (`no_of_visitors`, `working_time`, `no_of_ports`, `power_consumption`, `parking_slots`) VALUES ('".$_POST["no_of_visitors"]."','".$_POST["working_time"]."','".$_POST["no_of_ports"]."','".$_POST["power_consumption"]."','".$_POST["parking_slots"]."')";  

if(mysqli_query($connect, $sql))  
{    
   	 $command_exec = escapeshellcmd('python3 /var/www/html/TAKING_DATA_NEED_PREDICTION.py');
   	 $str_output = shell_exec($command_exec);
   	 $command_exec = escapeshellcmd('python3 /var/www/html//ML_ALGORITHM.py');
   	 $str_output = shell_exec($command_exec);
     header('Location: http://localhost/index.php?submitted=true');
}  
?>


