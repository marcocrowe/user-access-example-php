<?php require_once("app/require_once.php"); ?>
<!DOCTYPE html>
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
		<link rel="stylesheet" href="src/css/stylesheet.css" />
		<!--</Stylesheets>-->
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
		<header>
			<h1>PHP Access Web Example</h1>
			<nav>
				<ul>
					<li><a href="<?php echo WebPages::login; ?>">Login</a></li>
					<li><a href="<?php echo WebPages::register; ?>">Register</a></li>
					<li><a href="<?php echo WebPages::userAccounts; ?>">Users</a></li>
					<li><a href="<?php echo WebPages::logout; ?>">Logout</a></li>
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
				$userAccount = Application::$UserAccountRepository->GetUserAccountByCredentials($username, $password);
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
