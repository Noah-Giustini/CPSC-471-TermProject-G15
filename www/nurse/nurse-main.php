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
	<h1>Welcome Nurse</h1>
</header>

<body>
	<table style="vertical-align: bottom; margin-left: auto; margin-right: auto;">
		<tr>
			<th><a href="viewPatientList.php"><button>View Patients</button></a><br></th>
			<th><a href="viewNurseInfo.php"><button>View Personal Information</button></a><br></th>
		</tr><br>
	</table>

<br>
<a href='../logout.php'><button>Log out</button></a><br>
</body>
</html>
