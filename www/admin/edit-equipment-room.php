<?php
session_start();
if(!isset($_SESSION['login'])){
	header("Location: /index.php");
}
$EID  = $_GET["ID"];
echo '<form action="edit-equipment-roomQuery.php"  method="post">

   Equipment ID: <input type = "hidden" name = "EID" value =' . $EID. '><br>
   Room Number: <input type="text" name="RoomNumber" required><br>
   <input type="submit" value="Submit">
</form>
<br>
<a href="move-equipment.php">Back</a>
<br>
'
?>