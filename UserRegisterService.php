<?php
require_once("src/pagesupport/RegisterHtmlTagNames.php");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
		<?php
		if (isset($_POST[RegisterHtmlTagNames::RegisterButton]))
		{
			?>
			<h1>Register Button Pressed</h1>
			<?php
			$username = $_POST[RegisterHtmlTagNames::UsernameInput];
			$email = $_POST[RegisterHtmlTagNames::EmailInput];
			$password = $_POST[RegisterHtmlTagNames::PasswordInput];
			$confirmPassword = $_POST[RegisterHtmlTagNames::ConfirmPasswordInput];
			?>
			<h2>Username:<?php echo $username; ?></h2>
			<h2>email:<?php echo $email; ?></h2>
			<h2>Password:<?php echo $password; ?></h2>
			<h2>Confirm Password:<?php echo $confirmPassword; ?></h2>
			<?php
		}
		?>
    </body>
</html>