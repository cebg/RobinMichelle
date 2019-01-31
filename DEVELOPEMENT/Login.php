<?php
session_start();

if (isset($_SESSION['sig']))
{
	#User is already logged in
	echo ("<script>window.location='home.php'</script>");
}

if(isset($_REQUEST['submit']))

{
	#Perform login action
	$username=$_REQUEST['UserUsername'];
	$password=$_REQUEST['UserPassword'];

	include ('db_login.php');
	$query=mysql_query("SELECT * FROM Users WHERE UserUsername='".$username."' AND UserPassword='".$password."'")
	$row=mysql_fetch_array($query)
	if (empty($row)) 
	{
		#False Info/ User doesn't exist
		echo ('<script>alert("False login credentials!")</script>');
	}

	else
	{
		#User exists and login is successful
		$_SESSION['sig']="OK";
		echo ("<script>window.location="home.php"</script>");			

	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Connexion</title>
</head>
		<body>
			<h2 align="center"> Detout</h2>
				<center>
					<form method="post" action="Login.php">
					<input name="UserUsername" type="text" placeholder="Pseudo." >
					<br>
					<input name="UserPassword" type="password" placeholder="Mot de passe." >
					<br>
					<input type="submit" name="submit" value="submit">


						
					</form>
				</center>


		</body>
</html>