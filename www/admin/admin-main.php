<?php
session_start();
if(!isset($_SESSION['login'])){
	header("Location: /index.php");
}
?>

<html>
<body>
<h1>Welcome, Admin</h1>
<a href="view-all-patients.php">View Patients</a><br>
<a href="viewPatientList.php">Edit Patient Information</a><br>
<a href="admin-view-personal-info.php">View Personal Information</a><br>
<a href="move-bed.php">Move Bed</a><br>
<a href="move-equipment.php">Move Equipment</a><br>
<a href="assign-patient-room.php">Assign Patient Room or Ward</a><br>
<a href="index.php">Add Patient</a><br>
<a href="index.php">Add Doctor</a><br>
<a href="index.php">Add Nurse</a><br>
<a href="index.php">Add Admin</a><br>
</body>
</html>
