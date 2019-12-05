<?php
session_start();
if(!isset($_SESSION['login'])){
	header("Location: /index.php");
}
?>

<html>
<style type="text/css">
	body{
		text-align: center;
		margin: auto;
		vertical-align: middle;
		padding-bottom: 100px;
		padding-top: 100px;
		table-layout: fixed;
	}
	header{
		text-align: center;
		position: absolute;
		top:0;
		width: 100%;
		height: 60px;
		background: #6af;
		padding-bottom: 20px;
	}
	button{
		width: 200px;
		height:20px;
	}
</style>

<header>
	<h1>Welcome, Admin</h1>
</header>

<body>
<table style="vertical-align: bottom; margin-left: auto; margin-right: auto;">
	<tr>
		<th><a href="view-all-patients.php"><button>View Patients</button></a><br></th>
		<th><a href="viewPatientList.php"><button>Edit Patient Information</button></a><br></th>
		<th><a href="admin-view-personal-info.php"><button>View Personal Information</button></a><br></th>
	</tr><br>

	<tr>
		<th><a href="move-bed.php"><button>Move Bed</button></a><br></th>
		<th><a href="move-equipment.php"><button>Move Equipment</button></a><br></th>
		<th><a href="assign-patient-room.php"><button>Assign Patient Room or Ward</button></a><br></th>
	</tr><br>

	<tr>
		<th><a href="add-patient.php"><button>Add Patient</button></a><br></th>
		<th><a href="add-doctor.php"><button>Add Doctor</button></a><br></th>
		<th><a href="add-nurse.php"><button>Add Nurse</button></a><br></th>
	</tr><br>

	<tr>
		<th><a href="add-admin.php"><button>Add Admin</button></a><br></th>
		<th><a href="viewDoctorList.php"><button>View Doctors</button></a><br></th>
		<th><a href="viewNurseList.php"><button>View Nurses</button></a><br></th>
	</tr><br>
</table>


<br>
<a href='../logout.php'><button>Log out</button></a><br>
</body>

</html>


