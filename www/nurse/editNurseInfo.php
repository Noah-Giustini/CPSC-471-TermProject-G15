<?php
session_start();
if(!isset($_SESSION['login'])){
	header("Location: /index.php");
}
?>
<form action="editNurseInfoQuery.php" method="post">
   Password: <input type="text" name="Password" required><br>
   First Name: <input type="text" name="FName" required><br>
   Last Name: <input type="text" name="LName" required><br>
   <input type="submit" value="Submit">
</form>
<br>
<a href="viewNurseInfo.php">Back</a>
<br>