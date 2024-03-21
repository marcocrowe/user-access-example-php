<?php
require_once("src/pagesupport/RegisterHtmlTagNames.php");
require_once("src/Program.php");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>User Account Repository</title>
    </head>
    <body>
		<?php
		if(isset(filter_input(INPUT_POST, RegisterHtmlTagNames::RegisterButton)))
		{
			?>
			<h1>Register Button Pressed</h1>
			<?php
			$username = filter_input(INPUT_POST, RegisterHtmlTagNames::UsernameInput);
			$email = filter_input(INPUT_POST, RegisterHtmlTagNames::EmailInput);
			$password = filter_input(INPUT_POST, RegisterHtmlTagNames::PasswordInput);
			$confirmPassword = filter_input(INPUT_POST, RegisterHtmlTagNames::ConfirmPasswordInput);

			$userDatabase->Register($username, $email, $password);
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