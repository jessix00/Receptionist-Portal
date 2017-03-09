<?php
//connection
include 'conn.php';

if(!$conn)
    {
        echo 'Not Connected to Server';
    }
if(!mysqli_select_db($conn,'form-test'))
{
    echo 'Database Not Selected';
}

//DB Fields
$Name = $_POST ['Name'];
$CompanyName = $_POST ['CompanyName'];
$Meeting = $_POST['Meeting'];
$Badge = $_POST['Badge'];
$Vehicle = $_POST['Vehicle'];


$sql = "INSERT INTO `form1` (`Name`,`CompanyName`, `Meeting`, `Badge`, `Vehicle`,`DateTime-In`,`Display`) 
VALUES ('$Name','$CompanyName','$Meeting','$Badge','$Vehicle',NOW(),'1')";

if(!mysqli_query($conn,$sql))
{
    echo'Not Inserted';
}
else
{
   echo "<script>alert('Thank You!');</script>";
}
header("refresh:.5; url=client-signin.html");
?>

