<?php require_once("app/autoload.php"); ?>
<?php
use UserAccessExample\UserSessionManagement;
use UserAccessExample\Web\WebPages;

?>
<?php UserSessionManagement::LogoutCurrentUser(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>PHP Access Web Example: Login</title>
		<meta name="author" content="Mark Crowe">
		<meta name="description" content="PHP Access Web Example">
		<meta name="keywords" content="PHP, User, Login, Security, Session, Database, MySQL">
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
		<link rel="shortcut icon" href="resource/icon/favicon.ico" />
		<link rel="stylesheet" href="src/css/stylesheet.css" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
	<body>
		<header>
			<h1>PHP Access Web Example</h1>
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
			<h2>Logout</h2>
		</main>
	</body>
</html>
