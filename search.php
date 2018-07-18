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
				<option value="TimeIn">Date In</option>
				<option value="Timeout">Date Out</option>
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
				<th>Date In</th>
				<th>Date Out</th>
			</tr>

<?php 
session_start();
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
	$sql = "SELECT Name, CompanyName, Contact, Purpose, Badge, DATE_FORMAT(TimeIn,'%m/%e/%Y %h:%i %p') TimeIn, DATE_FORMAT(Timeout,'%m/%e/%Y %h:%i %p') Timeout FROM form1 WHERE $column LIKE '$query%' OR DATE_FORMAT(TimeIn, '%m/%e/%Y') LIKE '$query%' OR DATE_FORMAT(Timeout, '%m/%e/%Y') LIKE '$query%'";
	$result = mysqli_query($connection, $sql);



//Time convertion function
// 	function convert($date) {
// 		$converteddate = TimeIn("M j, Y g:ia". strtotime($date));
// 		return $converteddate;}
// echo $converteddate;
	
//If the number of rows in out result set is grater than zero, run this while loop. The while loop returns an associative array of strings.
	$_SESSION["searchResults"] = array();
	if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)){ 
		$_SESSION["searchResults"] []= $row; } 

		foreach ($_SESSION["searchResults"] as $data) {?>
		<tr>
			<td><?php echo $data ['Name']; ?></td> 
			<td><?php echo $data ['CompanyName']; ?></td> 
			<td><?php echo $data ['Contact']; ?></td> 
			<td><?php echo $data ['Purpose']; ?></td> 
			<td><?php echo $data ['Badge']; ?></td> 
			<td><?php echo $data ['TimeIn']; ?></td> 
			<td><?php echo $data ['Timeout']; ?></td> 
		</tr>
<?php
}
}

else {?> 
	<tr> <td colspan="7"> <?php echo "No Matches"; ?></td> </tr>
<?php
} }
?>

</table>
</body>
</html>
