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
$result = mysqli_query($con,"SELECT * FROM staff AS S, doctor AS D, doctor_is_in_ward AS DW, WARD AS W
 WHERE S.STAFF_UserID_pk = $UserID AND D.DOCTOR_UserID_fk=S.STAFF_UserID_pk AND DW.DW_UserID_fk = D.DOCTOR_UserID_fk AND DW.DW_WardID_fk = W.WardID_pk; ");

echo "<table border='1'>
<tr>
<th>WardID</th>
<th>Ward Name</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['DW_WardID_fk'] . "</td>";
  echo "<td>" . $row['Name'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

echo "<br>
<a href='viewDoctorInfo.php'>Back</a>
<br>";



mysqli_close($con);
?>
