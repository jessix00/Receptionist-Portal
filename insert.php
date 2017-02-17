<?php
//connection
$con = mysqli_connect ('localhost', 'root', 'Hellokitty');

if(!$con)
    {
        echo 'Not Connected to Server';
    }
if(!mysqli_select_db($con,'form-test'))
{
    echo 'Database Not Selected';
}

//DB Fields
$Name = $_POST ['Name'];
$Meeting = $_POST['Meeting'];
$Badge = $_POST['Badge'];
$Vehicle = $_POST['Vehicle'];


$sql = "INSERT INTO `form1` (`Name`, `Meeting`, `Badge`, `Vehicle`,`DateTime-In`,`Display`) 
VALUES ('$Name','$Meeting','$Badge','$Vehicle',NOW(),'1')";

if(!mysqli_query($con,$sql))
{
    echo'Not Inserted';
}
else
{
    echo 'Thank You!';
}
header("refresh:2; url=index.html");
?>

