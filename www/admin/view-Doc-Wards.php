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
$result = mysqli_query($con,"SELECT * FROM doctor_is_in_ward WHERE DW_UserID_fk = '$DocID'");

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Ward ID</th>
</tr>";




while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['DW_UserID_fk'] . "</td>";
  echo "<td>" . $row['DW_WardID_fk'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
echo "<br>
<a href='add-Doc-Ward.php?ID= " . $DocID . "'>Add Ward</a><br>";
echo "<br>
<a href=viewDoctorList.php>Back</a><br>";

mysqli_close($con);
?>
