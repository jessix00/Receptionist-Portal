<?php
$con = mysqli_connect ('localhost', 'root', '');

if(!$con)
    {
        echo 'Not Connected to Server';
    }
if(!mysqli_select_db($con,'form-test'))
{
    echo 'Database Not Selected';
}

$Name = $_POST ['Name'];
$Meeting = $_POST['Meeting'];
$Time = $_POST['Time'];
$Badge = $_POST['Badge'];
$Vehicle = $_POST['Vehicle'];

$sql = "INSERT INTO `form1` (`Name`, `Meeting`, `Time`, `Badge`, `Vehicle`) 
VALUES ('$Name','$Meeting','$Time','$Badge','$Vehicle')";

if(!mysqli_query($con,$sql))
{
    echo'Not Inserted';
}
else
{
    echo 'Inserted';
}
header("refresh:2; url=index.html");
?>

