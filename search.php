<html>
	<head>
		<title>Search</title>
			<link rel="stylesheet" href="searchStyles.css">
			<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
			<link href="fontawesome5.3.1-web/css/all.css" rel="stylesheet">
			<link rel="stylesheet" href="jquery/jquery-ui-1.12.1.custom/jquery-ui.min.css">
			<script src="jquery/jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
  			<script src="jquery/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	</head>

	<body>
		<div class="searchSection">
		<h1 class="searchTitle">Search</h1> 
			<!--Search Bar and Options-->
		<div class="searchBar">
				<form class="searchButton" method="post" action="search.php" autocomplete="off">
					<input class="keywordSearchField" type="text" id="date" name="query" placeholder="Search Keyword">
						<select class="dropDown" name="column" id="column_to_select">
							<option value="Filter">Filter By</option>
							<option value="Name">Name</option>
							<option value="CompanyName">Company Name</option>
							<option value="Contact">Ipro Contact</option>
							<option value="Purpose">Purpose</option>
							<option value="Badge">Badge Number</option>
							<option value="TimeIn">Date In</option>
							<option value="Timeout">Date Out</option>
						</select>
					<!--Find Button-->
					<button type="submit" name="submit" value="Find" <i class="fas fa-search"></i></button>
					
				</form>
				<!--CSV Export Button. If clicked, script on export.php will execute-->
				<form class= "exportButton" method="post" action="export.php">
					<button type="submit" name="export" value="Export" <i class="fas fa-file-download"></i></button>
				</form>
				<!--Visitor Log Link-->	
				 <a class= "visitorLink" href="disp.php"><i class="fas fa-arrow-left"></i></a>	
				
			</div>
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
//my Connection  
	include 'conn.php';
//My variables
if (isset($_POST['submit'])) {	
	$query = $conn->real_escape_string($_POST['query']);
	$column = $conn->real_escape_string($_POST['column']);
//Always default search to Name column
	if ($column == "" || ($column != "Name" && $column != "CompanyName" && $column != "Contact" && $column != "Purpose" && $column != "Badge" && $column != "TimeIn" && $column != "Timeout"))
 	$column = "Name";
//Fetch from DB where our selected column matches our query
	$sql = "SELECT Name, CompanyName, Contact, Purpose, Badge, DATE_FORMAT(TimeIn,'%m/%d/%Y %h:%i %p') TimeIn, DATE_FORMAT(Timeout,'%m/%d/%Y %h:%i %p') Timeout FROM form1 WHERE $column LIKE '$query%' OR DATE_FORMAT($column, '%m/%d/%Y') LIKE '$query%'";
	$result = mysqli_query($conn, $sql);
//If the number of rows in our result set is grater than zero, run this while loop. The while loop returns an associative array of strings that match our search term.
	session_start();
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

else { ?> 
	<tr> <td colspan="7"> <?php echo "No Matches"; ?></td> </tr>
<?php
} }
?>
</table>

<!--jQuery Date Picker script-->
<script>
//get value from selected column under the #column_to_select ID
	$('#column_to_select').change(function() {
//save that value under a variable called DateOption	
	var DateOption = $(this).val();
//if the value of the DateOption variable is TimeIn OR Timeout, add the datepicker
	if (DateOption == 'TimeIn' || DateOption == 'Timeout' ) {
	$('#date').datepicker();
//otherwise, remove datepicker.
	} else {
		$('#date').prev().val('');
		$('#date').datepicker("destroy")
}});
</script>
</body>
</html>
