<?php
session_start();

// Create connection
$con=mysqli_connect("localhost","test","test","mydb");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $prev_page = $_SESSION['Prev_Page'];

  

//   $result = mysqli_query($con, "SELECT * FROM patients");

//   echo "<table border= '1'>
//   <tr>
//   <th>ID</th>
// <th>Password</th>
// <th>First Name</th>
// <th>Last Name</th>
// <th>Health Care Number</th>

// </tr>";

// while($row = mysqli_fetch_array($result))
//   {
//   echo "<tr>";
//   echo "<td>" . $row['PATIENTS_USERID_pk'] . "</td>";
//   echo "<td>" . $row['Password'] . "</td>";
//   echo "<td>" . $row['FName'] . "</td>";
//   echo "<td>" . $row['LName'] . "</td>";
//   echo "<td>" . $row['HealthCareNum'] . "</td>";
//   echo "</tr>";
//   }
// echo "</table>";

// echo "<br>
// <a href=$prev_page>Back</a>
// <br>";


mysqli_close($con);
?>