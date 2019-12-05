<?php
session_start();
if(!isset($_SESSION['login'])){
	header("Location: /index.php");
}
include '../db_connection.php';
// vars from form
$password = $_POST["Password"];
$fname = $_POST["FName"];
$lname = $_POST["LName"];
//user var
$UserID = $_SESSION['UserId'];


// Create connection
$con=OpenCon();

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  $sql = "UPDATE STAFF SET Fname='$fname',LName='$lname',Password='$password' WHERE STAFF_UserID_pk = '$UserID';";
  //TODO: TEST this
 
 if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
  
echo "1 record successfuly updated";

mysqli_close($con);

echo '<br> <a href="viewDoctorInfo.php">Back</a> <br>';
?>