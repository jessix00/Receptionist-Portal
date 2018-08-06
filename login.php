<?php
//This page validates password and username 
	session_start();
	$username = "username";
	$password = "password";
	if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
		header("Location:disp.php");
	}
	if(isset($_POST['username']) && isset($_POST['password'])) {
		if ($_POST ['username'] == $username && $_POST['password'] == $password)
	{
		$_SESSION['loggedIn'] = true;
		header("Location: disp.php");
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