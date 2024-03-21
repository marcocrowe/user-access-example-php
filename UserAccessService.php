<?php
declare(strict_types=1);
require_once("src/DataObjects/UserAccountLoginResult.php");
require_once("src/pagesupport/LoginHtmlTagNames.php");
require_once("src/Program.php");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>User Login Service</title>
    </head>
    <body>
		<?php
		if(filter_input(INPUT_POST, LoginHtmlTagNames::LoginButton) != null)
		{
			?>
			<h1>Login Button Pressed</h1>
			<?php
			$username = filter_input(INPUT_POST, LoginHtmlTagNames::UsernameInput);
			$password = filter_input(INPUT_POST, LoginHtmlTagNames::PasswordInput);
			?>
			<h2>Username:<?php echo $username; ?></h2>
			<h2>Password:<?php echo $password; ?></h2>
			<?php
			$userAccount = $userDatabase->Login($username, $password);
			$loginResult = UserAccountLoginResult::GetLoginResult($userAccount);
			if($loginResult==UserAccountLoginResult::Success)
				UserSessionManagement::LoginUser($userAccount);
			$loginResultMessage = UserAccountLoginResult::GetLoginMessage($loginResult);
			?>
			<h3>
				<?php echo $loginResultMessage ?>
			</h3>
			<?php
		}
		?>
		<nav>
			<ul>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Register</a></li>
				<li><a href="userlist.php">Users</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</nav>
    </body>
</html>
