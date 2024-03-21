<?php
require_once("src/LoginHtmlTagNames.php");
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
		<form action="" method="post">
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
					<td><input name="LoginButton" type="submit" value="Login" /></td>
				</tr>
			</table>
		</form>
	</body>
</html>