<?php
//Connection to database
include 'conn.php';

//Select database where Timeout has no value
$sql = "SELECT * FROM form1 WHERE Timeout ='NULL'";
$result = $conn->query($sql);
?>

<!--Table starts here-->

<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Client Sign-In Form</title>
<!--Fonts/styles-->
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link href-"normalize.css" rel="stylesheet">
	  <style>
            body {
                font-family: "Roboto";
                font-size: 20px;
                background: #e2dedb;
                color: #000;
                }
              h1 {
                text-align: center;
               }   

               table {
                    position: relative;
                    margin: 20px auto 100px auto;
                    border: solid 1px #b3aca7;
                    background-color:#fff;
                    text-align: center;
               } 

               th {
                padding: 10px;
                background-color:#fff;
                    
               }
               td {
                   padding: 5px;
                   background-color:#fff;
                   border: solid 1px #b3aca7;
                       
               }
               tr {
                   border: solid 1px #b3aca7;
               }
    </style>
</head>
<body>

<h1>Sign-In Log</h1>
   <table>
     <tr>
            <th>Name</th>
            <th>Company Name</th>
            <th>Meeting</th>
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
        <td><?php echo $row['CompanyName']; ?></td>
        <td><?php echo $row['Meeting']; ?></td>
        <td><?php echo $row['Badge']; ?></td>
        <td><?php echo $row['Vehicle']; ?></td>

        <!--Edit Button -->
        <td><a href="edit.php?edit_id=<?php echo $row['ID']; ?>" alt="edit">Edit</a></td>

        <!-- Time-Out Button -->
        <td><input type="button" onClick="change(<?php echo $row['ID']; ?>)" name="Time-Out" value="Clock-Out"></td> 
    </tr>
    
<!--Time Out Button Script-->
<script language="javascript">
    function change(out) {
        if(confirm("Do you want to sign this client out?")){
            window.location.href='timeout.php?time_out=' +out+'';
            return true;
        }
    }
</script>


 <?php
 }
}
else
{
?>
<tr>
<th colspan-"2">No one in queue</th>
</tr>
<?php
}
?>

</table>
</body>
</html>