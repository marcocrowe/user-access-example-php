<?php
require_once("src/Program.php");
require_once("src/pagesupport/LoginHtmlTagNames.php");

UserSessionManagement::LogoutCurrentUser();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>PHP Access Web Example: Login</title>
	</head>
	<body>
		<h1>PHP Access Web Example</h1>
		<h2>Logout</h2>
		<nav>
			<ul>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Register</a></li>
				<li><a href="userlist.php">Users</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</nav>
	</body>
</html>