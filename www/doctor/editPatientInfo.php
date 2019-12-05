<?php
session_start();
if(!isset($_SESSION['login'])){
	header("Location: /index.php");
}
$PatientID  = $_GET["ID"];
echo '<form action="editPatientInfoQuery.php"  method="post">

   <input type = "hidden" name = "PatientID" value =' . $PatientID. '>
   First Name: <input type="text" name="FName" required><br>
   Last Name: <input type="text" name="LName" required><br>
   Health Care Num: <input type="text" name="HealthCareNum"required><br>
   <input type="submit" value="Submit">
</form>
<br>
<a href="viewPatientList.php">Back</a>
<br>
'
?>