<?php 
	if(isset($_POST["export"]))
{
	$connect = mysqli_connect("localhost", "root","","form-test");

//set headers to download file rather than displayed
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=data.csv');
	
//create a file pointer
	$output = fopen("php://output", "w");
//set column headers
	fputcsv ($output, array('ID', 'Name', 'Company Name', 'Ipro Contact', 'Purpose', 'Badge', 'Time In', 'Time Out'));
	
//get records from database
	$query = "SELECT * from form1 WHERE ID= 158";
	$result = mysqli_query($connect, $query);
	while($row = mysqli_fetch_assoc($result))
	{
	fputcsv($output, $row);
	}
	fclose($output);
}
?>