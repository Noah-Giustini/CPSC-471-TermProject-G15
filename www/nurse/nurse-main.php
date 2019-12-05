<?php
session_start();
if(!isset($_SESSION['login'])){
	header("Location: /index.php");
}
?>
<html>
<body>
<h1>Welcome, Nurse</h1>
<a href="viewPatientList.php">View Patients</a><br>
<a href="viewNurseInfo.php">View Personal Information</a><br>
<br>
<a href='../logout.php'>Log out</a><br>
</body>
</html>
