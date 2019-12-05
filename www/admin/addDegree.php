<?php
session_start();
if(!isset($_SESSION['login'])){
   header("Location: /index.php");
}
$DocID  = $_GET["ID"];
echo '<form action="addDegreeQuery.php"  method="post">

   <input type = "hidden" name = "DoctorID" value =' . $DocID. '><br>
   Degree: <input type="text" name="Degree" required><br>
   <input type="submit" value="Submit">
</form>
<br>
<a href="viewDoctorList.php">Back</a>
<br>
'
?>