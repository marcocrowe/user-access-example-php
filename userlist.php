<?php
require_once("src/pagesupport/RegisterHtmlTagNames.php");
require_once("src/Program.php");
?>
<!DOCTYPE html>
<html>
    <head>
		<title>PHP Access Web Example: Login</title>
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
			<?php UserSessionManagement::HandleUserAccess() ?>
			<h2>Users</h2>
			<table>
				<thead>
					<tr>
						<th>Username</th>
						<th>e-mail</th>
						<th>Active</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<?php
				foreach($userDatabase->GetUserAccounts() as $user)
				{
					?>
					<tr>
						<td><?php echo $user->getUsername(); ?></td>
						<td><?php echo $user->getEmail(); ?></td>
						<td><?php echo json_encode($user->getActive()); ?></td>
						<td><a href="useredit.php?id=<?php echo $user->getId(); ?>">edit</a></td>
					</tr>
					<?php
				}
				?>
			</table>
		</main>
    </body>
</html>
