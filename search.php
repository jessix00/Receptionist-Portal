<html>
	<head>
		<title>Advanced Search</title>
		<link rel="stylesheet" href="searchStyles.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	</head>
		<body>
		<h1>Advanced Search</h1>
	<!--Search Bar and Options-->
	<div class="searchBar">
		<form class="searchButton" method="post" action="search.php" autocomplete="off">
			<input type="text" name="query" placeholder="Search">
		<select name="column">
			<option value="Name">Name</option>
			<option value="CompanyName">Company Name</option>
			<option value="Contact">Ipro Contact</option>
			<option value="Purpose">Purpose</option>
			<option value="Badge">Badge Number</option>
			<option value="TimeIn">Time In</option>
			<option value="Timeout">Time Out</option>
		</select>
			<!--Find Button-->
			<input type="submit" name="submit" value="Find">
		</form>
		<!--CSV Export Button. If clicked, script on export.php will execute-->
		<form class= "exportButton" method="post" action="export.php">
			<input type="submit" name="export" value="Export"/>
		</form>
		<!--Visitor Log Button-->		
		<a href="disp.php">Visitor Log </a>
	</div>
		<table id="iproData">
			<tr>
				<th>Name</th>
				<th>Company Name</th>
				<th>Ipro Contact</th>
				<th>Purpose</th>
				<th>Badge</th>
				<th>Time In</th>
				<th>Time Out</th>
			</tr>

<?php 
//if "find" is clicked connect to DB, if error echo error msg
if (isset($_POST['submit'])) {
	$connection = new mysqli("localhost", "root", "","form-test");
	if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();}

//My variables
	$query = $connection->real_escape_string($_POST['query']);
	$column = $connection->real_escape_string($_POST['column']);

//Always default search to Name column
	if ($column == "" || ($column != "Name" && $column != "CompanyName" && $column != "Contact" && $column != "Purpose" && $column != "Badge" && $column != "TimeIn" && $column != "Timeout"))
	$column = "Name";

//Fetch from DB
	$sql = "SELECT * FROM form1 WHERE $column LIKE '%$query%'";
	$result = mysqli_query($connection, $sql);

	if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)){ ?>
<!--Display search results on html table-->
		<tr>
		<td><?php echo $row['Name']; ?></td>
		<td><?php echo $row['CompanyName']; ?></td>
		<td><?php echo $row['Contact']; ?></td>
		<td><?php echo $row['Purpose']; ?></td>
		<td><?php echo $row['Badge']; ?></td>
		<td><?php echo $row['TimeIn'] ?></td>
		<td><?php echo $row['Timeout']; ?><br></td>
	</tr>
<?php
}	
} 	

else { ?> 
	<tr> <td colspan="7"> <?php echo "No Matches"; ?></td> </tr>
<?php
} 
}
?>

</table>
</body>
</html>
