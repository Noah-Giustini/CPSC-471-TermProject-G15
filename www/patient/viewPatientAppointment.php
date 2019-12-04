<?php
include '../db_connection.php';
session_start();
if(!isset($_SESSION['login'])){
	header("Location: /index.php");
}
// Create connection
$con=OpenCon();

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$UserID = $_SESSION['PatientID'];



//query
$result = mysqli_query($con,"SELECT P.Time,P.Date,P.Reason,S.FName,S.LName FROM Appointment AS P, Staff as S WHERE P.PATIENT_UserID = $UserID AND S.STAFF_UserID_pk = P.DAPT_UserID_fk");

echo "<table border='1'>
<tr>
<th>Time</th>
<th>Date</th>
<th>Reason</th>
<th>Doctor First Name</th>
<th>Doctor Last Name</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['Time'] . "</td>";
  echo "<td>" . $row['Date'] . "</td>";
  echo "<td>" . $row['Reason'] . "</td>";
  echo "<td>" . $row['FName'] . "</td>";
  echo "<td>" . $row['LName'] . "</td>";
  
  echo "</tr>";
  }
echo "</table>";

echo "<br>
<a href=patient-main.php>Back</a>
<br>";



mysqli_close($con);
?>
