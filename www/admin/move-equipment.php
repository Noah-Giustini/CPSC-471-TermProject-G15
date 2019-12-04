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
 $result = mysqli_query($con, "SELECT * FROM equipment");


  echo "<table border= '1'>
  <tr>
  <th>Equipment ID</th>
<th>Name</th>
<th>Type</th>
<th>Room Number</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['Equiptment_ID_pk'] . "</td>";
  echo "<td>" . $row['Name'] . "</td>";
   echo "<td>" . $row['Type'] . "</td>";
    echo "<td>" . $row['EQUIPMENT_RoomNum_fk'] . "</td>";
  echo "<td><a href='edit-equipment-room.php?ID= " . $row['Equiptment_ID_pk'] . "'>Change Room</a></td>";
  echo "</tr>";
  }
echo "</table>";

echo "<br>
<a href=admin-main.php>Back</a>
<br>";



mysqli_close($con);
?>