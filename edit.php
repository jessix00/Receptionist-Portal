<?php
include 'conn.php';

//Get ID from Database
if(isset($_GET['edit_id'])){
    $sql = "SELECT * FROM data WHERE Name =" .$_GET['edit_id'];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
} 

//update the information 
if(isset($_POST['btn-update'])){
    $name = $_POST['name'];
    $meeting = $_POST['meeting'];
    $timein = $_POST['time'];
    $timeout = $_POST['timeout'];
    $badge = $_POST['badge'];
    $vehicle = $_POST['vehicle'];
        $update = "UPDATE data SET name='$name', meeting='$meeting', timein='$timein', 
        timeout='$timeout',badge='$badge',vehicle='$vehicle' WHERE Name =". $_GET['edit_id'];
        $up = mysqli_query($conn, $update);

 if(!isset($sql)){
 die ("Error $sql" .mysqli_connect_error());
 }
 else
 {
 header("location: disp.php");
 }
}
?>
<!--Create Edit form -->


<!doctype html>
<html>
<body>
    <form method="post">
        <h1>Edit Information</h1>
        <label>Name:</label><input type="text" name="Name" placeholder="Name" value="<?php echo $row['Name']; ?>"><br/><br/>
        <label>Meeting with:</label><input type="text" name="Meeting" placeholder="Meeting with" value="<?php echo $row['Meeting']; ?>"><br/><br/>
        <label>Time-In:</label><input type="text" name="Timein" placeholder="Time In" value="<?php echo $row['Timein']; ?>"><br/><br/>
        <label>Time-Out:</label><input type="text" name="Timeout" placeholder="Time Out" value="<?php echo $row['Timeout']; ?>"><br/><br/>
        <label>Badge-Number:</label><input type="text" name="Badge" placeholder="Badge Number" value="<?php echo $row['Badge']; ?>"><br/><br/>
        <label>Vehicle:</label><input type="text" name="Vehicle" placeholder="Vehicle" value="<?php echo $row['Vehicle']; ?>"><br/><br/>
            <button type="submit" name="btn-update" id="btn-update" onClick="update()"><strong>Update</strong></button>
                <a href="disp.php"><button type="button" value="button">Cancel</button></a>
</form>

<!-- Alert for Updating -->
<script>
function update(){
 var x;
 if(confirm("Updated data Sucessfully") == true){
 x= "update";
 }
}
</script>
</body>
</html>



