<?php
session_start();
if(!isset($_SESSION['login'])){
	header("Location: /index.php");
}
$BedID  = $_GET["ID"];
echo '<form action="edit-bed-wardQuery.php"  method="post">

   BedID: <input type = "hidden" name = "BedID" value =' . $BedID. '><br>
   Ward ID: <input type="text" name="WardID" required><br>
   <input type="submit" value="Submit">
</form>
<br>
<a href="move-bed.php">Back</a>
<br>
'
?>