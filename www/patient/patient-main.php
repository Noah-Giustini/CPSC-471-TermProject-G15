<?php
session_start();
if(!isset($_SESSION['login'])){
	header("Location: /index.php");
}
?>
<html>
<body>
<h1>Welcome, Patient</h1>
<a href="viewPatientAppointment.php">View Appointments</a><br>
<a href="bookAppointment.php">Book Appointment</a><br>
<a href="viewPatientInfo.php">View Personal Information</a><br>
<a href="viewPatientPrescriptions.php">View Prescriptions</a><br>
</body>
</html>
