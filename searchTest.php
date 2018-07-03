
<html>
	<head>
		<title>Search Test</title>
	</head>
	<body>
	<!--Search Bar-->
		<form method="post" action="search.php">
			<input type="text" name="q" placeholder="Search">
			<select name="column">
				<option value="Name">Name</option>
				<option value="CompanyName">Company Name</option>
				<option value="Contact">Ipro Contact</option>
				<option value="Purpose">Purpose</option>
				<option value="Badge">Badge Number</option>
				<!-- <option value="DriversLicense">Drivers License</option> -->
				<option value="TimeIn">Time In</option>
				<option value="Timeout">Time Out</option>
			</select>
			<input type="submit" name="submit" value="Find">
		</form>

		<table>
			<tr>
				<th>Name</th>
				<th>Company Name</th>
				<th>Contact</th>
				<th>Purpose</th>
				<th>Badge</th>
				<th>Time In</th>
				<th>Time Out</th>
			</tr>
		</table>

<?php 

if (isset($_POST['submit'])) {
	$connection = new mysqli("localhost", "root", "","form-test");


	$q = $connection->real_escape_string($_POST['q']);
	$column = $connection->real_escape_string($_POST['column']);

//default search to Name column
	if ($column == "" || ($column != "Name" && $column != "CompanyName" && $column != "Contact" && $column != "Purpose" && $column != "Badge" && $column != "TimeIn" && $column != "Timeout"))
	$column = "Name";
//fetch from DB
	$sql = "SELECT * FROM form1 WHERE $column LIKE '%$q%'";
	$result = mysqli_query($connection, $sql);

	if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
	?>
		
		<p> Name: <?php echo $row["Name"] . "" . $row["CompanyName"]; ?> </p>
<?php
}	
} 	else 
		echo "No Matches";
}
	

	//$sql = $connection->query( "SELECT * FROM form1 WHERE $column LIKE '%$q%'");
//	if($sql->num_rows > 0) {
//		while ($data = $sql-> fetch_array())
//			echo $data["Name"];
//
//	} else
//		echo "No Matches";
?>
</body>
</html>