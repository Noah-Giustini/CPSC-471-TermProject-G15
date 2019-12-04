<?php 
session_start();
if(!isset($_SESSION['login'])){
	header("Location: /index.php");
}
?>
<form action="add-patientQuery.php" method="post">
   User ID: <input type="text" name="UserID" required><br>
   Password: <input type="text" name="Password" required><br>
   First Name: <input type="text" name="FName" ><br>
   Last Name: <input type="text" name="LName" ><br>
   Health Care Number: <input type="text" name="HealthCareNum" ><br>

   <input type="submit" value="Submit">
</form>
<br>
<a href="admin-main.php">Back</a>
<br>