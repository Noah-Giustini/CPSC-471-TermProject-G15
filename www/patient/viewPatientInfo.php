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
$result = mysqli_query($con,"SELECT * FROM PATIENTS AS P WHERE P.PATIENTS_UserID_pk=$UserID");

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Password</th>
<th>First Name</th>
<th>Last Name</th>
<th>Health Care #</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['PATIENTS_USERID_pk'] . "</td>";
  echo "<td>" . $row['Password'] . "</td>";
  echo "<td>" . $row['FName'] . "</td>";
  echo "<td>" . $row['LName'] . "</td>";
  echo "<td>" . $row['HealthCareNum'] . "</td>";
  
  echo "</tr>";
  }
echo "</table>";

echo "<br>
<a href=patient-main.php>Back</a>
<br>";
echo "<a href=editPatientInfo.php>Edit Info</a> <br>";



mysqli_close($con);
?>
