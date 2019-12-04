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
$UserID = $_SESSION['UserID'];
$prev_page = $_SESSION['Prev_Page'];



//query
 $result = mysqli_query($con, "SELECT * FROM patients AS P, patient_is_in_ward AS PW, patient_is_in_room AS PR WHERE P.PATIENTS_USERID_pk = PR.PR_UserID_fk AND P.PATIENTS_USERID_pk = PW.PW_UserID_fk");


  echo "<table border= '1'>
  <tr>
  <th>ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Health Care Number</th>
<th>Ward ID</th>
<th>Room Number</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['PATIENTS_USERID_pk'] . "</td>";
  echo "<td>" . $row['FName'] . "</td>";
  echo "<td>" . $row['LName'] . "</td>";
  echo "<td>" . $row['HealthCareNum'] . "</td>";
  echo "<td>" . $row['PW_WardID_fk'] . "</td>";
  echo "<td>" . $row['PR_RoomNum_fk'] . "</td>";
  echo "<td><a href='edit-patient-room-ward.php?ID= " . $row['PATIENTS_USERID_pk'] . "'>Assign Room</a></td>";
  echo "<td><a href='edit-patient-room-ward.php?ID= " . $row['PATIENTS_USERID_pk'] . "'>Assign Ward</a></td>";
  echo "</tr>";
  }
echo "</table>";

echo "<br>
<a href=$prev_page>Back</a>
<br>";



mysqli_close($con);
?>