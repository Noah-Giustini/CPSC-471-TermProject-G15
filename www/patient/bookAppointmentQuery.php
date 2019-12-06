<?php
include '../db_connection.php';
session_start();
if(!isset($_SESSION['login'])){
	header("Location: /index.php");
}
// vars from form
$date = $_POST["Date"];
$time = $_POST["Time"];
$reason = $_POST["Reason"];
$docUID = $_POST["DoctorUserID"];
//user var
$UserID = $_SESSION['PatientID'];



// Create connection
$con=OpenCon();

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  //test query to make sure there is not already an appt at that time with same doc
  $testq = mysqli_query($con,"SELECT * FROM APPOINTMENT AS A WHERE A.TIME='$time' AND A.DAPT_UserID_fk = '$docUID' AND A.Date='$date'");
  $testq2 = mysqli_query($con,"SELECT * FROM APPOINTMENT AS A WHERE A.TIME='$time' AND A.PAPT_UserID_fk = '$UserID' AND A.Date='$date'");
//check to see if there was anything returned by query  
if (mysqli_num_rows($testq) < 1 && mysqli_num_rows($testq2) < 1){
  //if no try to insert
  $sql = "INSERT INTO APPOINTMENT VALUES ('$UserID','$time','$date','$reason','$docUID');";
 if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
  echo "Appointment successfully booked";
}
else {
  //else tell them to try again
  echo "$time, $date is unavailable with that doctor or you have an appointment already booked for this time. Please try again.";
}
  


mysqli_close($con);

echo '<br> <a href="viewPatientAppointment.php">Back</a> <br>';
?>