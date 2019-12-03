<?php
include '../db_connection.php';
// vars from form
$DoctorID = $_POST["DoctorID"];
$PatientID = $_POST["PatientID"];
$MedicineID = $_POST["MedicineID"];
$Frequency = $_POST["Frequency"];
$Dosage = $_POST["Dosage"];
$IsRefillable = $_POST["IsRefillable"];
if($IsRefillable!=1){
    $IsRefillable=0;
}

// Create connection
$con=OpenCon();
// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $sql = 'SELECT * FROM prescribed 
  WHERE PPRESC_UserID_fk='.$PatientID.' AND DPRESC_UserID_fk='.$DoctorID.' AND MEDICINE_MedicineID = '.$MedicineID.';';
  
  $testq = mysqli_query($con,$sql);
  if(mysqli_num_rows($testq) == 0){
    $sql = 'Insert INTO prescribed VALUES('.$PatientID.','.$DoctorID.','.$MedicineID.',"'.$Dosage.'","'.$Frequency.'","'.$IsRefillable.'")
    ;';  
    if (!mysqli_query($con,$sql))
    {
    die('Error: ' . mysqli_error($con));
    }
  echo "Prescription Added succesfully";
    } 
    else {
        echo "You have already prescribed this medicine to this patient. Please delete the previous prescription before trying again";
    }
 
 if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
  

mysqli_close($con);

echo '<br> <a href="viewPatientList.php">Back</a> <br>';
?>