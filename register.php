<?php
require_once("src/pagesupport/RegisterHtmlTagNames.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>PHP Access Web Example: Login</title>
	</head>
	<body>
		<h1>PHP Access Web Example</h1>
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
					<td><input name="<?php echo RegisterHtmlTagNames::ConfirmPasswordInput?>" type="password" /></td>
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
	</body>
</html>