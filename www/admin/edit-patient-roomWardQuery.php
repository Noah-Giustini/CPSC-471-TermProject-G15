<?php
include '../db_connection.php';
session_start();
if(!isset($_SESSION['login'])){
	header("Location: /index.php");
}
// vars from form
$ID = $_POST["PatientID"];
$room = $_POST["Room-Number"];
$ward = $_POST["WardID"];

// Create connection
$con=OpenCon();
// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  $sql = "UPDATE patient_is_in_ward SET PW_WardID_fk='$ward' WHERE PW_UserID_fk= '$ID'";
  $sql2 =  "UPDATE patient_is_in_room SET PR_RoomNum_fk='$room' WHERE PR_UserID_fk = '$ID'";
 
 if (!mysqli_query($con,$sql) || !mysqli_query($con, $sql2))
  {
  die('Error: ' . mysqli_error($con));
  }
  
echo "1 record succsessfuly updated";

mysqli_close($con);

echo '<br> <a href="assign-patient-room.php">Back</a> <br>';
?>