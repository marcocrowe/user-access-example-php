<?php require_once("app/autoload.php"); ?>
<?php
use UserAccessExample\Application;
use UserAccessExample\UserSessionManagement;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<title>PHP Access Web Example: Login</title>
		<meta name="author" content="Mark Crowe">
		<meta name="description" content="PHP Access Web Example">
		<meta name="keywords" content="PHP, User, Login, Security, Session, Database, MySQL">
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
		<!--<link rel="shortcut icon" href="resource/icon/favicon.ico" />-->
		<link rel="stylesheet" href="src/css/stylesheet.css" />
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
			<?php UserSessionManagement::HandleUserAccess() ?>
			<table>
				<caption>Users</caption>
				<thead>
					<tr>
						<th>Username</th>
						<th>e-mail</th>
						<th>Active</th>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<?php
				foreach(Application::$UserAccountRepository->GetUserAccounts() as $user)
				{
					?>
					<tr>
						<td><?php echo $user->getUsername(); ?></td>
						<td><?php echo $user->getEmail(); ?></td>
						<td><?php echo json_encode($user->getActive()); ?></td>
						<td><a href="<?php echo WebPages::userAccount . "?" . UserAccountHtmlTagNames::Id . "=" . $user->getId(); ?>">view</a></td>
						<td><a href="<?php echo WebPages::userAccountEdit . "?" . UserAccountHtmlTagNames::Id . "=" . $user->getId(); ?>">edit</a></td>
						<td><a href="<?php echo WebPages::userAccountEdit . "?" . UserAccountHtmlTagNames::Id . "=" . $user->getId(); ?>">delete</a></td>
					</tr>
					<?php
				}
				?>
			</table>
		</main>
    </body>
</html>
