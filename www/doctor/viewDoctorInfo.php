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
$result = mysqli_query($con,"SELECT * FROM staff AS S, doctor AS D WHERE S.STAFF_UserID_pk = $UserID AND D.DOCTOR_UserID_fk=S.STAFF_UserID_pk;");

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Password</th>
<th>First Name</th>
<th>Last Name</th>
<th>Salary</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['STAFF_UserID_pk'];
  echo "<td>" . $row['Password'] . "</td>";
  echo "<td>" . $row['FName'] . "</td>";
  echo "<td>" . $row['LName'] . "</td>";
  echo "<td>" . $row['Salary'] . "</td>";
  echo "<td><a href='viewDoctorWards.php'>View Wards</a></td>";
  echo "<td><a href='editDoctorInfo.php'>Update</a></td>";
  
  echo "</tr>";
  }
echo "</table>";

echo "<br>
<a href='doctor-main.php'>Back</a>
<br>";



mysqli_close($con);
?>
