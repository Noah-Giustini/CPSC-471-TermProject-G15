<?php


// Create connection
$con=mysqli_connect("localhost","test","test","mydb");
session_start();
// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $UserID = $_SESSION['PatientID'];
  $prev_page = $_SESSION['Prev_Page'];

  $result = mysqli_query($con, "SELECT * FROM patients");

  echo "<table border= '1'>
  <tr>
  <th>ID</th>
<th>Password</th>
<th>First Name</th>
<th>Last Name</th>
<th>Health Care Number</th>

</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['PATIENTS_USERID_pk'] . "</td>";
  echo "<td>" . $row['Password'] . "</td>";
  echo "<td>" . $row['FName'] . "</td>";
  echo "<td>" . $row['LName'] . "</td>";
  echo "<td>" . $row['HealthCareNum'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

echo "<br>
<a href=$prev_page>Back</a>
<br>";


mysqli_close($con);
?>


<html>
	<head>
		<title>View All Patients</title>

		<style type="text/css">
			body{
				font-family: Arial, Helvetica, sans-serif;
				font-size: 14px;
			}
			label{
				font-weight: bold;
				width:100px;
				font-size: 14px;
			}
			.box{
				border: #666666 solid 1px;
			}
		</style>
	</head>

	<body bgcolor = #123456>
		<div align="center"></div>
	</body>