<?php
//connection
include 'conn.php';

if(!$conn)
    {
        echo 'Not Connected to Server';
    }
//Select DB
if(!mysqli_select_db($conn,'form-test'))
    {
    echo 'Database Not Selected';
    }

//Form Fields
$Name = $_POST ['Name'];
$CompanyName = $_POST ['CompanyName'];
$Meeting = $_POST['Meeting'];
$Badge = $_POST['Badge'];
$Vehicle = $_POST['Vehicle'];

$sql = "INSERT INTO `form1` (`Name`,`CompanyName`, `Meeting`, `Badge`, `Vehicle`,`DateTime-In`) 
VALUES ('$Name','$CompanyName','$Meeting','$Badge','$Vehicle',NOW())";//NOW inserts curent time date

if(!mysqli_query($conn,$sql))
{
    echo'Not Inserted';
}
else
{
    //Alert for Submitting
   echo "<script>alert('Thank You!');</script>";
}
    //refresh/reloads index page
header("refresh:.3; url=index.html");
?>

