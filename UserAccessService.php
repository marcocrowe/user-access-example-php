<?php
require_once("src/pagesupport/LoginHtmlTagNames.php");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
		<?php
		if (isset($_POST[LoginHtmlTagNames::LoginButton]))
		{
			?>
			<h1>Login Button Pressed</h1>
			<?php
			$username = $_POST[LoginHtmlTagNames::UsernameInput];
			$password = $_POST[LoginHtmlTagNames::PasswordInput];
			?>
			<h2>Username:<?php echo $username; ?></h2>
			<h2>Password:<?php echo $password; ?></h2>
			<?php
		}
		?>
    </body>
</html>
