<?php
session_start();
if(!isset($_SESSION['login'])){
   header("Location: /index.php");
}
$DocID  = $_GET["ID"];
echo '<form action="add-Doc-WardQuery.php"  method="post">

   Doctor ID: <input type = "hidden" name = "DoctorID" value =' . $DocID. '><br>
   Ward ID: <input type="text" name="WardID" required><br>
   <input type="submit" value="Submit">
</form>
<br>
<a href="viewDoctorList.php">Back</a>
<br>
'
?>