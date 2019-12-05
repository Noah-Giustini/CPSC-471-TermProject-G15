
  <!-- THIS NEEDS MORE INFO -->
   <!-- SQL for Doctor is  select * from staff as S, doctor as D, doctor_degrees AS Dd, doctor_is_in_ward as DW WHERE S.STAFF_UserID_pk = Dd.DOCDEG_UserID_fk AND S.STAFF_UserID_pk = DW.DW_UserID_fk AND S.STAFF_UserID_pk = D.DOCTOR_UserID_fk;-->

   <?php
include '../db_connection.php';
session_start();
if(!isset($_SESSION['login'])){
	header("Location: /index.php");
}
// vars from form
$UserID = $_POST["UserID"];
$password = $_POST["Password"];
$ssn = $_POST["SSN"];
$FName = $_POST["FName"];
$LName = $_POST["LName"];
$salary = $_POST["Salary"];
$isSpecialist = $_POST["IsSpecialist"];
$specialist = $_POST["Specialist"];



// Create connection
$con=OpenCon();

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  //test query to make sure there is not already an user with the same ID
  $testq = mysqli_query($con,"SELECT * FROM staff AS S, patients AS P WHERE P.PATIENTS_USERID_pk='$UserID' OR S.STAFF_UserID_pk = '$UserID'");
//check to see if there was anything returned by query  
if (mysqli_num_rows($testq) < 1){
  //if no try to insert
  $sql = "INSERT INTO staff VALUES ('$UserID','$password','$ssn', '$FName','$LName','$salary', 'DOCTOR');";
  $sql2 = "INSERT INTO doctor VALUES ('$UserID', '$isSpecialist', '$specialist');";
 if (!mysqli_query($con,$sql) || !mysqli_query($con,$sql2))
  {
  die('Error: ' . mysqli_error($con));
  }
  echo "New Doctor Added";
}
else {
  //else tell them to try again
  echo "User with ID $UserID already exists. Enter a unique User ID.";
}
  


mysqli_close($con);

echo '<br> <a href="add-doctor.php">Back</a> <br>';
?>