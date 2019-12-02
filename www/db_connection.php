<?php
function OpenCon(){
    $dbhost = "localhost";
    $dbuser = "471user";
    $dbpass = "";
    $db = "mydb";

    $con = new mysqli($dbhost,$dbuser,$dbpass,$db) or die("Connect Failed: %s\n". $con->error);
    return $con; 
}

function CloseCon($con){
    $con->close();
}


?>