<?php
require_once("src/pagesupport/LoginHtmlTagNames.php");
require_once("src/Program.php");
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
			$userDatabase = new UserDatabase();
			$user = $userDatabase->Login($username, $password);

			if (isset($user) && $user->getActive())
			{
				?>
				<h3>Login Successful</h3>
				<?php
			} else if (isset($user) && $user->getActive() == false)
			{
				?>
				<h3>User Login Disabled</h3>
				<?php
			} else
			{
				?>
				<h3>Login Failed</h3>
				<?php
			}
		}
		?>
    </body>
</html>
