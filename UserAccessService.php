<?php
declare(strict_types=1);
require_once("src/DataObjects/UserAccountLoginResult.php");
require_once("src/pagesupport/LoginHtmlTagNames.php");
require_once("src/Program.php");
?>
<html>
    <head>
        <title>User Login Service</title>
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
		<link rel="stylesheet" href="resource/css/stylesheet.css" />
		<!--</Stylesheets>-->
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
		<header>
			<h1>PHP Access Web Example</h1>
			<nav>
				<ul>
					<li><a href="login.php">Login</a></li>
					<li><a href="register.php">Register</a></li>
					<li><a href="userlist.php">Users</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
		</header>
		<main>
			<?php
			if(filter_input(INPUT_POST, LoginHtmlTagNames::LoginButton) != null)
			{
				?>
				<h2>Login Button Pressed</h2>
				<?php
				$username = filter_input(INPUT_POST, LoginHtmlTagNames::UsernameInput);
				$password = filter_input(INPUT_POST, LoginHtmlTagNames::PasswordInput);
				?>
				<h2>Username:<?php echo $username; ?></h2>
				<h2>Password:<?php echo $password; ?></h2>
				<?php
				$userAccount = $userDatabase->Login($username, $password);
				$loginResult = UserAccountLoginResult::GetLoginResult($userAccount);
				if($loginResult == UserAccountLoginResult::Success)
					UserSessionManagement::LoginUser($userAccount);
				$loginResultMessage = UserAccountLoginResult::GetLoginMessage($loginResult);
				?>
				<h3>
					<?php echo $loginResultMessage ?>
				</h3>
				<?php
			}
			?>
		</main>
    </body>
</html>
