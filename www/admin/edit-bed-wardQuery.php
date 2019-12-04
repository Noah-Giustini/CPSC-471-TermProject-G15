<?php
include '../db_connection.php';
session_start();
if(!isset($_SESSION['login'])){
	header("Location: /index.php");
}
// vars from form
$ID = $_POST["BedID"];
$ward = $_POST["WardID"];

// Create connection
$con=OpenCon();
// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  $sql = "UPDATE bed SET BED_WardID_fk = $ward WHERE BedNum_pk = $ID";
  
 
 if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
  
echo "1 record succsessfuly updated";

mysqli_close($con);

echo '<br> <a href="move-bed.php">Back</a> <br>';
?>