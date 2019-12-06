<?php
include '../db_connection.php';
session_start();
if(!isset($_SESSION['login'])){
	header("Location: /index.php");
}
// vars from form
$UserID = $_POST["UserID"];
$password = $_POST["Password"];
$FName = $_POST["FName"];
$LName = $_POST["LName"];
$healthNum = $_POST["HealthCareNum"];



// Create connection
$con=OpenCon();

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  //test query to make sure there is not already an user with the same ID
  $testq = mysqli_query($con,"SELECT * FROM staff AS S, patients AS P WHERE P.PATIENTS_USERID_pk='$UserID' OR S.STAFF_UserID_pk = '$UserID'");
//check to see if there was anything returned by query  
if (mysqli_num_rows($testq) < 1){
  //if no try to insert
  $sql = "INSERT INTO patients VALUES ('$UserID','$password','$FName','$LName','$healthNum');";
  $sql2 = "INSERT INTO patient_is_in_ward VALUES ('$UserID', 1);";
  $sql3 = "INSERT INTO patient_is_in_room VALUES ('$UserID', 1337);";
 if (!mysqli_query($con,$sql) || !mysqli_query($con,$sql2) || !mysqli_query($con,$sql3))
  {
  die('Error: ' . mysqli_error($con));
  }
  echo "New Patient Added";
}
else {
  //else tell them to try again
  echo "User with ID $UserID already exists. Enter a unique User ID.";
}
  


mysqli_close($con);

echo '<br> <a href="add-patient.php">Back</a> <br>';
?>