<?php
//Connection
include ("conn.php");

//Selects column the "Timeout", updates the time to current. Remember, if timeout has a value, it will disappear from disp.php
$select= "UPDATE form1 set Timeout=NOW() WHERE ID =". $_GET['time_out'];
$query = mysqli_query($conn, $select) or die($select);

//Returns you to the display table
header ("location: disp.php")
?>