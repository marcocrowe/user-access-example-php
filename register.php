<?php
require_once("src/pagesupport/RegisterHtmlTagNames.php");
require_once("src/WebPages.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>PHP Access Web Example: Login</title>
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
			<h2>Register</h2>
			<form action="<?php echo RegisterHtmlTagNames::FormActionPage ?>" method="post">
				<table>
					<tr>
						<td>Username:</td>
						<td><input name="<?php echo RegisterHtmlTagNames::UsernameInput ?>" type="text" /></td>
					</tr>
					<tr>
						<td>e-mail:</td>
						<td><input name="<?php echo RegisterHtmlTagNames::EmailInput ?>" type="email" /></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input name="<?php echo RegisterHtmlTagNames::PasswordInput ?>" type="password" /></td>
					</tr>
					<tr>
						<td>Confirm Password:</td>
						<td><input name="<?php echo RegisterHtmlTagNames::ConfirmPasswordInput ?>" type="password" /></td>
					</tr>
					<tr>
						<td></td>
						<td><input name="<?php echo RegisterHtmlTagNames::RegisterButton ?>" type="submit" value="Register" /></td>
					</tr>
					<tr>
						<td></td>
						<td><input name="OtherButton" type="submit" value="Other Button" /></td>
					</tr>
				</table>
			</form>
		</main>
	</body>
</html>