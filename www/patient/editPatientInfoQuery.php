<?php
include '../db_connection.php';
session_start();
if(!isset($_SESSION['login'])){
	header("Location: /index.php");
}
// vars from form
$password = $_POST["Password"];
$fname = $_POST["FName"];
$lname = $_POST["LName"];
$hc = $_POST["HealthCareNum"];
//user var
$UserID = $_SESSION['PatientID'];



// Create connection
$con=OpenCon();

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  $sql = "UPDATE PATIENTS as P SET P.FName='$fname',P.LName='$lname',P.Password='$password',P.HealthCareNum='$hc' WHERE P.PATIENTS_USERID_pk = '$UserID'";
  
 
 if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
  
echo "1 record succsessfuly updated";

mysqli_close($con);

echo '<br> <a href="viewPatientInfo.php">Back</a> <br>';
?>