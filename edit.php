<?php
//connection
include 'conn.php';

//Select Database 
if(isset($_GET['edit_id'])){
    $sql = "SELECT * FROM form1 WHERE ID =" .$_GET['edit_id'];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);   
} 

//update the information in these columns
if(isset($_POST['btn-update'])){
    $name = $_POST['Name'];
    $companyname = $_POST['CompanyName'];
    $meeting = $_POST['Meeting'];
    $badge = $_POST['Badge'];
    $vehicle = $_POST['Vehicle'];
        $update = "UPDATE form1 SET Name='$name', CompanyName='$companyname',Meeting='$meeting', 
        Badge='$badge',Vehicle='$vehicle' WHERE ID =". $_GET['edit_id'];
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

<!--Edit form -->
<!doctype html>
<html>
    <head> 

    <!--Fonts/styles-->
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link href-"normalize.css" rel="stylesheet">
	  <style type="text/css">
            body {
                font-family: "Roboto";
                font-size: 20px;
                background: #e2dedb;

            }
            h1 {
                position: relative;
                margin: 10px 0 10px 0;
                font-size: 30px;
                text-align: center;
                padding:10px;
            }

            label {
                padding:5px;
            }

            input {
                width: 300px;
                height: 30px;
                font-family: "Roboto";
                font-size: 18px;
                padding-left:10px;
                float: right;
            }

            form {
                position: relative;
                width: 500px;
                margin: 20px auto 100px auto;
	        }
            button {
                font-family: "Roboto";
                text-decoration:none;
                font-size: 18px;
                cursor:pointer;
            }
            
        </style>
    </head>
<!--Form input fields start here-->
<body>
    <form method="post">
        <h1>Edit Information</h1>
        <label>Full Name:</label><input type="text" name="Name" placeholder="Name" value="<?php echo $row['Name']; ?>"><br/><br/>
        <label>Company Name:</label><input type="text" name="CompanyName" placeholder="Company Name" value="<?php echo $row['CompanyName']; ?>"><br/><br/>
        <label>Meeting with:</label><input type="text" name="Meeting" placeholder="Meeting with" value="<?php echo $row['Meeting']; ?>"><br/><br/>
        <label>Badge-Number:</label><input type="number" name="Badge" placeholder="Badge Number" value="<?php echo $row['Badge']; ?>"><br/><br/>
        <label>Vehicle:</label><input type="text" name="Vehicle" placeholder="Vehicle" value="<?php echo $row['Vehicle']; ?>"><br/><br/>
            <button type="submit" name="btn-update" id="btn-update" onClick="update()"><strong>Save &amp; Submit</strong></button>
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



