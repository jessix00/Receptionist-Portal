<?php
//This page displays current visitors in the office
//Connection to database
include 'conn.php';
if(!$conn)
    {
    echo 'Not Connected to Server';
    }
//checks login is valid
//  session_start();
//if session has not started or if loggedIn is false return to login page
//  if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
//   header("Location: login.php");
//  }
//Select only database items where Timeout has no value
  $sql = "SELECT * FROM form1 WHERE Timeout IS NULL";
  $result = $conn->query($sql);
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<title>Visitor Log</title>
  	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="fontawesome5.3.1-web/css/all.css" rel="stylesheet">
  	<link href-"normalize.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="dispStyles.css">
  </head>
<body>
  <div id="getData">
    <h1 class="visitorTitle">Current Visitors</h1>
      <table>
        <tr>
          <th class="firstHead">Name</th>
          <th class="firstHead">Company Name</th>
          <th class="firstHead">Ipro Contact</th>
          <th class="firstHead">Purpose</th>
          <th class="firstHead">Badge</th>
          <th class="firstHead"> <a class="searchLink" href="search.php"><i class="fas fa-search"></i><span class= "searchText">Search</span></a></th>
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
        <td class="firstRows"><button><a href="edit.php?edit_id=<?php echo $row['ID']; ?>" alt="edit" title="Edit Visitor"><i class="fas fa-user-edit"></i></a></button> 
        <button type="button" onClick="change(<?php echo $row['ID']; ?>)" name="Time-Out" title="Sign-Out" value="Sign-Out"> <i class="fas fa-sign-out-alt"></i></td></button>
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