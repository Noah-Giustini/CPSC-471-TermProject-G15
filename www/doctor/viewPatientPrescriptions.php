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

$PatientID = $_GET["ID"];
//$UserID = $_SESSION['DoctorID'];
$UserID = 882229;
$prev_page = $_SESSION["Prev_Page"];



//query
$result = mysqli_query($con,"SELECT P.MEDICINE_MedicineID,M.MedicineName,P.Dosage,P.Frequency,P.IsRefillable 
FROM PRESCRIBED AS P, MEDICINE AS M WHERE P.PPRESC_UserID_fk=$PatientID AND M.MedicineID_pk=P.MEDICINE_MedicineID");

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
  echo "<td><a href='deletePrescription.php?MedID= " . $row["MEDICINE_MedicineID"] . "&DocID=".$UserID."&PatientID=".$PatientID." '>Delete</a></td>";
  echo "</tr>";
  }
echo "</table>";

echo "<br>
<a href='addPrescription.php?DocID=".$UserID."&PatientID=".$PatientID."'>Add Prescription</a>
<br>";
echo "<br>
<a href=$prev_page>Back</a>
<br>";

mysqli_close($con);
?>
