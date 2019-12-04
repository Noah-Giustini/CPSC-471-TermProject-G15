<?php
include '../db_connection.php';
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
  
  $sql = "UPDATE patient_is_in_ward AS PW, patient_is_in_room AS PR SET PW.PW_WardID_fk='$ward' SET PR.PR_RoomNum_fk='$room', WHERE PR.PR_UserID_fk = '$ID' AND PW.PW_UserID_fk = '$ID'";
  
 
 if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
  
echo "1 record succsessfuly updated";

mysqli_close($con);

echo '<br> <a href="assign-patient-room.php">Back</a> <br>';
?>