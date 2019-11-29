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

if ($_GET["job"] == "update"){

  $ID = $_POST["ID"];
  $name = $_POST["name"];
  $email = $_POST["email"];
    
  $result = mysqli_query($con,"update Users set name='".$name. "', email='". $email. "' where ID=". $ID);
  
  } 

//query
$result = mysqli_query($con,"SELECT * FROM PATIENTS AS P WHERE P.PATIENTS_UserID_pk=$UserID");

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Password</th>
<th>First Name</th>
<th>Last Name</th>
<th>Health Care #</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['PATIENTS_USERID_pk'] . "</td>";
  echo "<td>" . $row['Password'] . "</td>";
  echo "<td>" . $row['FName'] . "</td>";
  echo "<td>" . $row['LName'] . "</td>";
  echo "<td>" . $row['HealthCareNum'] . "</td>";
  echo "<td><a href='update.php?ID= " . $row['ID'] . "'>Update</a></td>";
  
  echo "</tr>";
  }
echo "</table>";

echo "<br>
<a href=$prev_page>Back</a>
<br>";



mysqli_close($con);
?>
