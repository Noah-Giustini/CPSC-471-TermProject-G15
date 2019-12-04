<?php
session_start();
if(!isset($_SESSION['login'])){
	header("Location: /index.php");
}
?>
<html>
<body>
<h1>Welcome, Doctor</h1>
<a href="viewPatientList.php">View Patients</a><br>
<a href="viewDoctorInfo.php">View Personal Information</a><br>
</body>
</html>
