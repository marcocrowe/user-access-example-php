<?php require_once("app/require_once.php"); ?>
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
		<link rel="stylesheet" href="src/css/stylesheet.css" />
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
			<h2>Login</h2>
			<form action="<?php echo LoginHtmlTagNames::FormActionPage; ?>" method="post">
				<table>
					<tr>
						<td>Username:</td>
						<td><input name="<?php echo LoginHtmlTagNames::UsernameInput; ?>" type="text" /></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input name="<?php echo LoginHtmlTagNames::PasswordInput; ?>" type="password" /></td>
					</tr>
					<tr>
						<td></td>
						<td><input name="<?php echo LoginHtmlTagNames::LoginButton; ?>" type="submit" value="Login" /></td>
					</tr>
					<tr>
						<td></td>
						<td><input name="OtherButton" type="submit" value="Other Button" /></td>
					</tr>
				</table>
			</form>

			<table>
				<tr>
					<td colspan="2">Active User Account</td>
				</tr>
				<tr>
					<td>Username:</td>
					<td><?php echo Application::$UserAccountRepository->getActiveUser()->getUsername(); ?></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><?php echo UserAccountSessionRepository::DefaultPassowrd; ?></td>
				</tr>
				<tr>
					<td colspan="2">Disabled User Account</td>
				</tr>
				<tr>
					<td>Username:</td>
					<td><?php echo Application::$UserAccountRepository->getDisabledUser()->getUsername(); ?></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><?php echo UserAccountSessionRepository::DefaultPassowrd; ?></td>
				</tr>
				<tr>
					<td colspan="2">Incorrect Login details</td>
				</tr>
				<tr>
					<td>Username:</td>
					<td>anything</td>
				</tr>
				<tr>
					<td>Password:</td>
					<td>anything</td>
				</tr>
			</table>
		</main>
	</body>
</html>