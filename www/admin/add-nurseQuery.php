<?php
include '../db_connection.php';
session_start();
if(!isset($_SESSION['login'])){
	header("Location: /index.php");
}
// vars from form
$UserID = $_POST["UserID"];
$password = $_POST["Password"];
$ssn = $_POST["SSN"];
$FName = $_POST["FName"];
$LName = $_POST["LName"];
$salary = $_POST["Salary"];
$ward = $_POST["WardID"];



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
  $sql = "INSERT INTO staff VALUES ('$UserID','$password','$ssn', '$FName','$LName','$salary', 'NURSE');";
  $sql2 = "INSERT INTO nurse VALUES ('$UserID', '$ward');";
 if (!mysqli_query($con,$sql) || !mysqli_query($con,$sql2))
  {
  die('Error: ' . mysqli_error($con));
  }
  echo "New Nurse Added";
}
else {
  //else tell them to try again
  echo "User with ID $UserID already exists. Enter a unique User ID.";
}
  


mysqli_close($con);

echo '<br> <a href="add-nurse.php">Back</a> <br>';
?>