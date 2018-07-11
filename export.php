<?php 
session_start();
	if(isset($_POST["export"]))
{
	$connect = mysqli_connect("localhost", "root","","form-test");

//set headers to download file rather than display
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=data.csv');
	
//create a file pointer
	$output = fopen("php://output", "w");
	$header = array_keys($_SESSION["searchResults"][0]);

//set column headers
	fputcsv ($output, $header);

	foreach($_SESSION["searchResults"] as $row){
		fputcsv($output, $row);
	}
	fclose($output);

}

?>