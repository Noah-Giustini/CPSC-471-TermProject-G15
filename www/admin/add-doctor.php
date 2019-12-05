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
   Specialist: <input type="checkbox" name="JobTitle" ><br>
   <!-- THIS NEEDS MORE INFO -->
   <!-- SQL for Doctor is  select * from staff as S, doctor as D, doctor_degrees AS Dd, doctor_is_in_ward as DW WHERE S.STAFF_UserID_pk = Dd.DOCDEG_UserID_fk AND S.STAFF_UserID_pk = DW.DW_UserID_fk AND S.STAFF_UserID_pk = D.DOCTOR_UserID_fk;-->

   <input type="submit" value="Submit">
</form>
<br>
<a href="admin-main.php">Back</a>
<br>