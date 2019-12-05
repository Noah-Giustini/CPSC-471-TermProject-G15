<?php
session_start();
if(!isset($_SESSION['login'])){
	header("Location: /index.php");
}
include '../db_connection.php';
session_start();
// Create connection
$con=OpenCon();

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$UserID = $_SESSION['UserID'];
$prev_page = $_SESSION['Prev_Page'];



//query
//fix this to include ward and room???
$result = mysqli_query($con,"SELECT * FROM PATIENTS");

echo "<table border='1'>
<tr>
<th>ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Health Care #</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['PATIENTS_USERID_pk'] . "</td>";
  echo "<td>" . $row['FName'] . "</td>";
  echo "<td>" . $row['LName'] . "</td>";
  echo "<td>" . $row['HealthCareNum'] . "</td>";
  echo "<td><a href='editPatientInfo.php?ID= " . $row['PATIENTS_USERID_pk'] . "'>Edit Info</a></td>";
  echo "<td><a href='viewPatientPrescriptions.php?ID= " . $row['PATIENTS_USERID_pk'] . "'>View Prescriptions</a></td>";
  echo "</tr>";
  }
echo "</table>";

echo "<br>
<a href='doctor-main.php'>Back</a>
<br>";



mysqli_close($con);
?>
