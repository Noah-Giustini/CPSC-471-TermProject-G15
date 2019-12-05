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
   Is Specialist(0 for No, 1 for Yes): <input type="text" name="IsSpecialist" ><br>
   Specialist: <input type="text" name="Specialist" ><br>

   <input type="submit" value="Submit">
</form>
<br>
<a href="admin-main.php">Back</a>
<br>