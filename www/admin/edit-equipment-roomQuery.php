<?php
include '../db_connection.php';
session_start();
if(!isset($_SESSION['login'])){
	header("Location: /index.php");
}
// vars from form
$ID = $_POST["EID"];
$room = $_POST["RoomNumber"];

// Create connection
$con=OpenCon();
// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  $sql = "UPDATE equipment SET EQUIPMENT_RoomNum_fk = $room WHERE Equiptment_ID_pk = $ID";
  
 
 if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
  
echo "1 record succsessfuly updated";

mysqli_close($con);

echo '<br> <a href="move-equipment.php">Back</a> <br>';
?>