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


//query
$result = mysqli_query($con,"SELECT * FROM staff AS S, doctor AS D WHERE D.DOCTOR_UserID_fk = S.STAFF_UserID_pk;");

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Password</th>
<th>SSN</th>
<th>First Name</th>
<th>Last Name</th>
<th>Salary</th>
<th>Specialty</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['STAFF_UserID_pk'] . "</td>";
  echo "<td>" . $row['Password'] . "</td>";
  echo "<td>" . $row['SSN'] . "</td>";  
  echo "<td>" . $row['FName'] . "</td>";
  echo "<td>" . $row['LName'] . "</td>";
  echo "<td>" . $row['Salary'] . "</td>";
  echo "<td>" . $row['Specialty'] . "</td>";
  echo "<td><a href='view-Doc-Wards.php?ID= " . $row['STAFF_UserID_pk'] . "'>View Wards</a></td>";
  echo "<td><a href='viewDocDegrees.php?ID= " . $row['STAFF_UserID_pk'] . "'>View Degrees</a></td>";
  echo "</tr>";
  }
echo "</table>";

echo "<br>
<a href=admin-main.php>Back</a>
<br>";



mysqli_close($con);
?>
