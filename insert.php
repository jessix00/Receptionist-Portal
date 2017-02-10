<?php
$con = mysqli_connect ('localhost', 'root', 'Hellokitty');

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
$Timein = $_POST['Timein'];
$Badge = $_POST['Badge'];
$Vehicle = $_POST['Vehicle'];

$sql = "INSERT INTO `form1` (`Name`, `Meeting`, `Timein`, `Badge`, `Vehicle`) 
VALUES ('$Name','$Meeting','$Timein','$Badge','$Vehicle')";

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

