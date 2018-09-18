<?php
//connection
include 'conn.php';
//select database 
if(isset($_GET['edit_id'])){
    $sql = "SELECT * FROM form1 WHERE ID =" .$_GET['edit_id'];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);} 
//update the information in these columns
if(isset($_POST['btn-update'])){
    $name = $_POST['Name'];
    $companyname = $_POST['CompanyName'];
    $contact = $_POST['Contact'];
    $purpose = $_POST['Purpose'];
    $badge = $_POST['Badge'];
    $update = "UPDATE form1 SET Name='$name', CompanyName='$companyname',Contact='$contact',Purpose='$purpose', Badge='$badge' WHERE ID =". $_GET['edit_id'];
    $up = mysqli_query($conn, $update);

 if(!isset($sql)){
    die ("Error $sql" .mysqli_connect_error());}
 else {
        header("location: disp.php");}}
?>

<!--edit form -->
<!DOCTYPE HTML>
<html>
    <head> 
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href-"normalize.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="editStyles.css">
    </head>
<!--Form input fields start here-->
<body>
    <h1 class="editTitle">Edit Information</h1>
     <form method="post" autocomplete="off">
            <label>Full Name:</label><input type="text" name="Name" placeholder="Name" value="<?php echo $row['Name']; ?>"><br/><br/>
            <label>Company Name:</label><input type="text" name="CompanyName" placeholder="Company Name" value="<?php echo $row['CompanyName']; ?>"><br/><br/>
            <label>Contact:</label><input type="text" name="Contact" placeholder="Contact" value="<?php echo $row['Contact']; ?>"><br/><br/>
            <label>Purpose:</label><input type="text" name="Purpose" placeholder="Purpose" value="<?php echo $row['Purpose']; ?>"><br/><br/>
            <label>Badge-Number:</label><input type="number" name="Badge" placeholder="Badge Number" value="<?php echo $row['Badge']; ?>"><br/><br/>
            <div class="buttonContainer">
            <button type="submit" name="btn-update" id="btn-update" onClick="update()">Save</button>
            <a href="disp.php"><button type="button" value="button">Cancel</button></a> 
            </div>
    </form>
<!-- alert for updating -->
<script>
    function update(){
    var x;
        if(confirm("Updated Sucessfully") == true){
         x= "update"; }}
</script>
</body>
</html>