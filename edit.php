<?php
include 'conn.php';

//Get ID from Database
if(isset($_GET['edit_id'])){
    $sql = "SELECT FROM data WHERE form1 =" ._$GET['edit_id'];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
}

//update the information 
if(isset($_POST['btn-update'])){
 $name = $_POST['name'];
 $gender = $_POST['gender'];
 $department = $_POST['department'];
 $address = $_POST['address'];
 $mobile = $_POST['mobile'];
 $email = $_POST['email'];
 $update = "UPDATE data SET name='$name', gender='$gender',department='$department',address='$address',mobile='$mobile',email='$email' WHERE empid=". $_GET['edit_id'];
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




