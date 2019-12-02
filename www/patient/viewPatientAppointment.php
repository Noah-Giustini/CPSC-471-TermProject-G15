<?php
session_start();
// Create connection
$con=mysqli_connect("localhost","root","","mydb");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$UserID = $_SESSION['PatientID'];
$prev_page = $_SESSION['Prev_Page'];



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
