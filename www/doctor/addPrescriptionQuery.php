<?php
include '../db_connection.php';
// vars from form
$DoctorID = $_POST["DoctorID"];
$PatientID = $_POST["PatientID"];
$MedicineID = $_POST["MedicineID"];
$Frequency = $_POST["Frequency"];
$Dosage = $_POST["Dosage"];
$IsRefillable = $_POST["IsRefillable"];


// Create connection
$con=OpenCon();
// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  $sql = 'Insert INTO prescribed VALUES('.$PatientID.','.$DoctorID.','.$MedicineID.',"'.$Dosage.'","'.$Frequency.'","'.$IsRefillable.'")
  ';
  
 
 if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
  
echo "1 prescription successfuly added";

mysqli_close($con);

echo '<br> <a href="viewPatientList.php">Back</a> <br>';
?>