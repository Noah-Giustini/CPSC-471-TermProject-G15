<?php
include '../db_connection.php';

session_start();
// Create connection
$con=OpenCon();
// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$userID = $_POST['UserID'];
$password = $_POST['Password'];

$sql = "SELECT * FROM staff AS S WHERE S.STAFF_UserID_pk = '$userID' AND S.Password = '$password' AND S.JobTitle = 'NURSE'";
$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result) == 1){
  $_SESSION["UserID"] = $userID;
	header("Location: nurse-main.php");

}else{
	header("Location: login.php");
}


mysqli_close($con);
?>