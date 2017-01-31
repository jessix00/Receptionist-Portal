<?php
$server = "localhost";
$user = "root";
$pass = "Hellokitty";
$dbname = "form-test";

//Create a connection in mysqli

$conn = new mysqli($server, $user, $pass, $dbname);
//check connection 
if($conn->connect_error){
    die("error on connection:" .$connection->connecr_error);
}
?>