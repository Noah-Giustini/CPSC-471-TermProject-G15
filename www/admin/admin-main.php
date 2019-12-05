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
<a href="add-patient.php">Add Patient</a><br>
<a href="add-doctor.php">Add Doctor</a><br>
<a href="add-nurse.php">Add Nurse</a><br>
<a href="add-admin.php">Add Admin</a><br>
<a href="viewDoctorList.php">View Doctors</a><br>
<a href="viewNurseList.php">View Nurses</a><br>
<br><br><br>
<input type="button" name = "Logout" value="Logout" onClick = "window.location='../index.php';"/>
<!-- FIX THE LOGOUT TO CLEAR THE SESSION, OTHERWISE THE USER IS NOT LOGGED OUT -->

</body>

</html>


