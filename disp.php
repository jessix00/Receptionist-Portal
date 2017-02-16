<?php
//Connection to database
include 'conn.php';
//Select database

$sql = "SELECT * FROM form1";
$result = $conn->query($sql);
?>
<!--Form starts here-->
<!DOCTYPE HTML>
<html>
<body>
<h1 align="center">Sign In-Log</h1>
<table border ="1" align="center" style="line-height:25px;">
<tr>
<th>Name</th>
<th>Meeting</th>
<th>Time-Out </th>
<th>Badge</th>
<th>Vehicle</th>
</tr>


<?php
//Fetch data from DB
if($result ->num_rows > 0){
 while($row = $result->fetch_assoc()){
?>

<tr>
<td><?php echo $row['Name']; ?></td>
<td><?php echo $row['Meeting']; ?></td>
<td><?php echo $row['Timeout']; ?></td>
<td><?php echo $row['Badge']; ?></td>
<td><?php echo $row['Vehicle']; ?></td>
<!--Edit Option -->
<td><a href="edit.php?edit_id=<?php echo $row['ID']; ?>" alt="edit">Edit</a></td>
</tr>
<?php
 }
}
else
{
?>
<tr>
<th colspan-"2">No Data Found!</th>
</tr>
<?php
}
?>
</body>
</html>
</table>
