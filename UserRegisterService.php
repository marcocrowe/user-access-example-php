<?php
require_once("src/pagesupport/RegisterHtmlTagNames.php");
require_once("src/Program.php");
?>
<html>
    <head>
        <title>User Account Repository</title>
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
			if(isset(filter_input(INPUT_POST, RegisterHtmlTagNames::RegisterButton)))
			{
				?>
				<h2>Register Button Pressed</h2>
				<?php
				$username = filter_input(INPUT_POST, RegisterHtmlTagNames::UsernameInput);
				$email = filter_input(INPUT_POST, RegisterHtmlTagNames::EmailInput);
				$password = filter_input(INPUT_POST, RegisterHtmlTagNames::PasswordInput);
				$confirmPassword = filter_input(INPUT_POST, RegisterHtmlTagNames::ConfirmPasswordInput);

				$userAccount = UserAccount::Construct(true, 0, $email, $username);

				$userDatabase->CreateUserAccount($userAccount, $password);
				?>
				<h2>Username:<?php echo $username; ?></h2>
				<h2>email:<?php echo $email; ?></h2>
				<h2>Password:<?php echo $password; ?></h2>
				<h2>Confirm Password:<?php echo $confirmPassword; ?></h2>
				<?php
			}
			?>
		</main>
    </body>
</html>