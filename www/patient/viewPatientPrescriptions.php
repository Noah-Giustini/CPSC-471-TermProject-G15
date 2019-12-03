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

$UserID = $_SESSION['PatientID'];


if ($_GET["job"] == "update"){

  $ID = $_POST["ID"];
  $name = $_POST["name"];
  $email = $_POST["email"];
    
  $result = mysqli_query($con,"update Users set name='".$name. "', email='". $email. "' where ID=". $ID);
  
  } 
    
  if ($_GET["job"] == "delete"){
  $ID = $_GET["ID"];
  $result = mysqli_query($con,"Delete from Users where ID=". $ID );
  
  }
//query
$result = mysqli_query($con,"SELECT M.MedicineName,P.Dosage,P.Frequency,P.IsRefillable FROM PRESCRIBED AS P, MEDICINE AS M WHERE P.PPRESC_UserID_fk=$UserID AND M.MedicineID_pk=P.MEDICINE_MedicineID");

echo "<table border='1'>
<tr>
<th>Medicine</th>
<th>Dosage</th>
<th>Frequency</th>
<th>Refillable</th>
</tr>";




while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['MedicineName'] . "</td>";
  echo "<td>" . $row['Dosage'] . "</td>";
  echo "<td>" . $row['Frequency'] . "</td>";
  echo "<td>" . $row['IsRefillable'] . "</td>";
  echo "<td><a href='update.php?ID= " . $row['ID'] . "'>Update</a></td>";
  
  echo "</tr>";
  }
echo "</table>";

echo "<br>
<a href=patient-main.php>Back</a>
<br>";

mysqli_close($con);
?>
