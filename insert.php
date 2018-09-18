<?php
// This page inserts inputs from index (client sign in page)to our database.
//connection to database
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
$Contact = $_POST ['Contact'];
$Purpose = $_POST ['Purpose'];
$Badge = $_POST ['Badge'];

//Inserts inputs into DB
$sql = "INSERT INTO form1 (Name, CompanyName, Contact, Purpose, Badge, TimeIn,Timeout) 
VALUES ('$Name','$CompanyName','$Contact','$Purpose','$Badge', NOW(), NULL)";//NOW inserts current time date

if(!mysqli_query($conn,$sql))
{
    echo'Not Inserted';
}
else
{
//Alert for Submitting
    echo "<script>alert('Thank You!');</script>";
}
//refresh index page
    header("refresh:.3; url=index.html");
?>

