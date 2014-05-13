<?php
include ("../includes/functions.php");
connect();
?>
<html>
	<head>
		<title>My Game</title>
		<link href="style.css" rel="stylesheet" type="text/css" />
		<body>

			<div id="header">
				Your Game
			</div>
			<div id="container">
				<div id="navigation">
					<div id="nav_div">
						<?php

if(isset($_SESSION['uid'])){ 
include("../includes/safe.php");
echo "Welcome, ".$user['username']."<br />";
//Navigation Hub
?>
&raquo; <a href="main.php">Your Stats</a><br />
&raquo; <a href="units.php">Your Units</a><br />
&raquo; <a href="weapons.php">Your Weapons</a><br />
&raquo; <a href="rankings.php">Battle Player</a><br />
<hr>
<?php
echo "<a href=\"logout.php\">Logout</a>";
}else{
						?>
						<form action="login.php" method="post">
							Username:
							<input type="text" name="username"/>
							<br />
							Password:
							<input type="password" name="password"/>
							<br />
							<input type="submit" name="login" value="login">
							<br />
							<a href="register.php">Register</a>
						</form>

						<?php
						}
						?>
					</div>
				</div>
				<div id="content">
					<div id="con_div">
