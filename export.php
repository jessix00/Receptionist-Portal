<?php 
//This script exports our search results to a CSV file.
//If our Export button has been clicked, run the following..
session_start();
	if(isset($_POST["export"]))
{
//set headers to download file rather than display
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=data.csv');
	
//create a file pointer
	$output = fopen("php://output", "w");
//returns array in our search
	$header = array_keys($_SESSION["searchResults"][0]);

//set document column headers like database column names
	fputcsv ($output, $header);

//Loops trough our searchResults array and displays in our CSV file.
	foreach($_SESSION["searchResults"] as $row){
		fputcsv($output, $row);
	}
	fclose($output);
}
?>