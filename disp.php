<?php
//This page displays current visitors in the office
//Connection to database
include 'conn.php';
if(!$conn)
    {
    echo 'Not Connected to Server';
    }
//checks login is valid
  session_start();
//if session has not started or if loggedIn is false return to login page
  if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
   header("Location: login.php");
  }
//Select only database items where Timeout has no value
  $sql = "SELECT * FROM form1 WHERE Timeout ='NULL'";
  $result = $conn->query($sql);
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<title>Visitor Log</title>
  	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  	<link href-"normalize.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="dispStyles.css">
  </head>
<body>
  <div id="getData">
    <h1>Visitor Log</h1>
      <table>
        <tr>
          <th class="firstHead">Name</th>
          <th class="firstHead">Company Name</th>
          <th class="firstHead">Ipro Contact</th>
          <th class="firstHead">Purpose</th>
          <th class="firstHead">Badge</th>
          <th class="firstHead"> <a href="search.php">Search</a></th>
      </tr>
<?php
//Fetch data from DB
if($result ->num_rows > 0){
 while($row = $result->fetch_assoc()){
?>
    <tr>
        <td class="firstRows"><?php echo $row['Name']; ?></td>
        <td class="firstRows"><?php echo $row['CompanyName']; ?></td>
        <td class="firstRows"><?php echo $row['Contact']; ?></td>
        <td class="firstRows"><?php echo $row['Purpose']; ?></td>
        <td class="firstRows"><?php echo $row['Badge']; ?></td>
       <!--Edit/Sign-Out Buttons -->
        <td class="firstRows"><button><a class="editButton" href="edit.php?edit_id=<?php echo $row['ID']; ?>" alt="edit">Edit</a></button> 
        <input type="button" onClick="change(<?php echo $row['ID']; ?>)" name="Time-Out" value="Sign-Out"></td>
    </tr>
</div>

<?php
}}
else { 
?>
  <tr>
    <th colspan="6"> Empty Queue</th>
  </tr>
<?php
     }
?>

<!--Time Out Button Script -->
<script language="javascript">
    function change(out) {
        if(confirm("Do you want to clock-out visitor?")){
            window.location.href='timeout.php?time_out=' +out+'';
            return true;
        }
    }
//Ajax auto-refresh
  function dis () {
  xmlhttp=new XMLHttpRequest ();
  xmlhttp.open("GET","disp.php",false);
  xmlhttp.send(null);
  document.getElementById("getData").innerHTML=xmlhttp.responseText;
}
  dis();
  setInterval (function(){
  dis();
}, 2000);
</script>

</table>
</body>
</html>