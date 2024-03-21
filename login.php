<?php
require_once("src/Program.php");
require_once("src/pagesupport/LoginHtmlTagNames.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>PHP Access Web Example: Login</title>
	</head>
	<body>
		<h1>PHP Access Web Example</h1>
		<h2>Login</h2>
		<form action="<?php echo LoginHtmlTagNames::FormActionPage ?>" method="post">
			<table>
				<tr>
					<td>Username:</td>
					<td><input name="<?php echo LoginHtmlTagNames::UsernameInput ?>" type="text" /></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input name="<?php echo LoginHtmlTagNames::PasswordInput ?>" type="password" /></td>
				</tr>
				<tr>
					<td></td>
					<td><input name="<?php echo LoginHtmlTagNames::LoginButton ?>" type="submit" value="Login" /></td>
				</tr>
				<tr>
					<td></td>
					<td><input name="OtherButton" type="submit" value="Other Button" /></td>
				</tr>
			</table>
		</form>
		<nav>
			<ul>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Register</a></li>
				<li><a href="userlist.php">Users</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</nav>

		<table>
			<tr>
				<td colspan="2">Active User Account</td>
			</tr>
			<tr>
				<td>Username:</td>
				<td><?php echo $userDatabase->getActiveUser()->getUsername() ?></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><?php echo UserAccountSessionRepository::DefaultPassowrd ?></td>
			</tr>
			<tr>
				<td colspan="2">Disabled User Account</td>
			</tr>
			<tr>
				<td>Username:</td>
				<td><?php echo $userDatabase->getDisabledUser()->getUsername() ?></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><?php echo UserAccountSessionRepository::DefaultPassowrd ?></td>
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
	</body>
</html>