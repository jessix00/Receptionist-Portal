<?php
//This page validates password and username 
// Escape email to protect against SQL injections
session_start();
$username = $mysqli->escape_string($_POST['username']);
$result = $mysqli->query("SELECT * FROM form2 WHERE username='$username'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: error.php");
}
else { // User exists
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['password'], $user['password']) ) {
        
        $_SESSION['email'] = $user['email'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['active'] = $user['active'];
        
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;

        header("location: profile.php");
    }
    else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: error.php");
    }
}

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Portal</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link href-"normalize.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="indexStyles.css">
</head>

<body>
	<img class="logo" src="img/ipro.png" alt="Ipro Logo" >
	<h1 class="signin-header">Visitor Log</h1>

<!--Form fields-->
	<div class= "container">
		<form method="post" action="login.php">		
			<input name="username" type="text" placeholder="Username" required/>
			<input name="password" type="password" placeholder="Password" required/>	
			<button type="submit">Login</button>
	</div>
		</form>
</body>
</html>