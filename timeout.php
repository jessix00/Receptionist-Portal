<?php
/*Connection*/
include ("conn.php");

/*Selects column the "Timeout", updates the time to current*/
$select= "UPDATE form1 set Timeout=NOW() WHERE ID =". $_GET['time_out'];
$query = mysqli_query($conn, $select) or die($select);

/*Returns you to the table*/
header ("location: disp.php")
?>