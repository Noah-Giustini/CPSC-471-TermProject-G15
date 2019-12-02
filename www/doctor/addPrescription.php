<?php
$PatientID  = $_GET["PatientID"];
$DocID = $_GET["DocID"];

echo '<form action="addPrescriptionQuery.php"  method="post">
   DoctorID:<input type = "hidden" name = "DoctorID" value =' . $DocID. '><br>
   PatientID: <input type = "hidden" name = "PatientID" value =' . $PatientID. '><br>
   MedicineID: <input type="text" name="MedicineID" required><br>
   Dosage: <input type="text" name="Dosage" required><br>
   Frequency: <input type="text" name= "Frequency" required><br>
   IsRefillable<input type="checkbox" name IsRefillable>
   <input type="submit" value="Add">
</form>
<br>
<a href="viewPatientList.php">Back</a>
<br>
'
?>