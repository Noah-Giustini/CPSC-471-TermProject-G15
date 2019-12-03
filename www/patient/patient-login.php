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

$sql = "SELECT * FROM PATIENTS AS P WHERE P.PATIENTS_UserID_pk = '$userID' AND P.Password = '$password'";
$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result) == 1){
  $_SESSION["UserID"] = $userID;
  $_SESSION['PatientID'] = $userID;
	header("Location: patient-main.php");

}else{
	header("Location: login.php");
}


mysqli_close($con);
?>