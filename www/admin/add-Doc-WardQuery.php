<?php
include '../db_connection.php';
session_start();
if(!isset($_SESSION['login'])){
	header("Location: /index.php");
}
// vars from form
$ID = $_POST["DoctorID"];
$ward = $_POST["WardID"];

// Create connection
$con=OpenCon();
// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  $sql = "INSERT INTO doctor_is_in_ward VALUES ('$ID', '$ward');";
  
 
 if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
  
echo "1 ward succsessfuly added";

mysqli_close($con);

echo '<br> <a href="viewDoctorList.php">Back</a> <br>';
?>