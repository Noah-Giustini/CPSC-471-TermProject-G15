<?php
$PatientID  = $_GET["ID"];
echo '<form action="edit-patient-roomWardQuery.php"  method="post">

   PatientID: <input type = "hidden" name = "PatientID" value =' . $PatientID. '><br>
   Room Number: <input type="text" name="Room-Number" required><br>
   Ward ID: <input type="text" name="WardID" required><br>
   <input type="submit" value="Submit">
</form>
<br>
<a href="assign-patient-room.php">Back</a>
<br>
'
?>