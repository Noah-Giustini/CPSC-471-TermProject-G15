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

$DocID = $_GET["ID"];


//query
$result = mysqli_query($con,"SELECT * FROM doctor_degrees WHERE DOCDEG_UserID_fk = '$DocID'");

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Degree</th>
</tr>";




while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['DOCDEG_UserID_fk'] . "</td>";
  echo "<td>" . $row['Degree'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
echo "<br>
<a href='addDegree.php?ID= " . $DocID . "'>Add Degree</a><br>";
echo "<br>
<a href=viewDoctorList.php>Back</a><br>";

mysqli_close($con);
?>
