<?php 
session_start();
if(!isset($_SESSION['login'])){
	header("Location: /index.php");
}
?>
<form action="add-doctorQuery.php" method="post">
   User ID: <input type="text" name="UserID" required><br>
   Password: <input type="text" name="Password" required><br>
   SSN: <input type="text" name="SSN" ><br>
   First Name: <input type="text" name="FName" ><br>
   Last Name: <input type="text" name="LName" ><br>
   Salary: <input type="text" name="Salary" ><br>
   Is Specialist: <input type="checkbox" name="IsSpecialist" value = "1"><br>
   Specialty: <input type="text" name="Specialist" ><br>

   <input type="submit" value="Submit">
</form>
<br>
<a href="admin-main.php">Back</a>
<br>