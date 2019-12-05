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

$NurseID = $_GET["ID"];


//query
$result = mysqli_query($con,"SELECT * FROM nurses_certification WHERE NURCER_UserID_fk = '$NurseID'");

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Certification</th>
</tr>";




while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['NURCER_UserID_fk'] . "</td>";
  echo "<td>" . $row['Certification'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
echo "<br>
<a href='addCertification.php?ID= " . $NurseID . "'>Add Certification</a><br>";
echo "<br>
<a href=viewNurseList.php>Back</a><br>";

mysqli_close($con);
?>
