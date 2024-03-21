<?php
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
		<table>
			<tr>
				<td colspan="2">Active User Account</td>
			</tr>
			<tr>
				<td>Username:</td>
				<td>user</td>
			</tr>
			<tr>
				<td>Password:</td>
				<td>password</td>
			</tr>
			<tr>
				<td colspan="2">Disabled User Account</td>
			</tr>
			<tr>
				<td>Username:</td>
				<td>user1</td>
			</tr>
			<tr>
				<td>Password:</td>
				<td>password</td>
			</tr>
			<tr>
				<td colspan="2">Incorrect Login details</td>
			</tr>
			<tr>
				<td>Username:</td>
				<td>user</td>
			</tr>
			<tr>
				<td>Password:</td>
				<td>123</td>
			</tr>
		</table>
	</body>
</html>