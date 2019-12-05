<?php
session_start();
if(!isset($_SESSION['login'])){
   header("Location: /index.php");
}
$NurseID  = $_GET["ID"];
echo '<form action="addCertificationQuery.php"  method="post">

   <input type = "hidden" name = "NurseID" value =' . $NurseID. '><br>
   Certification: <input type="text" name="Certification" required><br>
   <input type="submit" value="Submit">
</form>
<br>
<a href="viewNurseList.php">Back</a>
<br>
'
?>