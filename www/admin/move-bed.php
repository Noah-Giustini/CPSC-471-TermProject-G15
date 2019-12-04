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
$UserID = $_SESSION['UserID'];
$prev_page = $_SESSION['Prev_Page'];



//query
 $result = mysqli_query($con, "SELECT * FROM bed");


  echo "<table border= '1'>
  <tr>
  <th>Bed Number</th>
<th>Ward ID</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['BedNum_pk'] . "</td>";
  echo "<td>" . $row['BED_WardID_fk'] . "</td>";
  echo "<td><a href='edit-bed-ward.php?ID= " . $row['BedNum_pk'] . "'>Change Ward</a></td>";
  echo "</tr>";
  }
echo "</table>";

echo "<br>
<a href=admin-main.php>Back</a>
<br>";



mysqli_close($con);
?>