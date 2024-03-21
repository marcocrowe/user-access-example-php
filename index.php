<?php
require_once("src/Program.php");
require_once("src/pagesupport/LoginHtmlTagNames.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>PHP User Access Web Example : Index</title>
		<!--<Meta Content>-->
		<meta name="author" content="Mark Crowe">
		<meta name="description" content="PHP Access Web Example">
		<meta name="keywords" content="PHP, User, Login, Security, Session, Database, MySQL">
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
		<!--</Meta Content>-->
		<!--<Icon>-->
		<!--<link rel="shortcut icon" href="resource/icon/favicon.ico" />-->
		<!--</Icon>-->
		<!--<Stylesheets OrderIsImportant="true">-->
		<link rel="stylesheet" href="resource/css/stylesheet.css" />
		<!--</Stylesheets>-->
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
	<body>
		<header>
			<h1>PHP Access Web Example : Index</h1>
			<nav>
				<ul>
					<li><a href="<?php echo WebPages::login; ?>">Login</a></li>
					<li><a href="<?php echo WebPages::register; ?>">Register</a></li>
					<li><a href="<?php echo WebPages::userAccounts; ?>">Users</a></li>
					<li><a href="<?php echo WebPages::logout; ?>">Logout</a></li>
				</ul>
			</nav>
		</header>
		<main>
		</main>
	</body>
</html>
