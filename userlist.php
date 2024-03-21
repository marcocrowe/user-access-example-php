<?php
require_once("src/pagesupport/RegisterHtmlTagNames.php");
require_once("src/Program.php");
?>
<!DOCTYPE html>
<html>
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>PHP Access Web Example: Login</title>
	</head>
	<body>
		<?php UserSessionManagement::HandleUserAccess() ?>
		<h1>PHP Access Web Example</h1>
		<h2>Users</h2>
		<table>
			<?php
			foreach($userDatabase->GetUserAccounts() as $user)
			{
				?>
				<tr>
					<td><?php echo $user->getUsername(); ?></td>
					<td><?php echo $user->getEmail(); ?></td>
					<td><?php echo $user->getActive(); ?></td>
				</tr>
				<?php
			}
			?>
		</table>
		<nav>
			<ul>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Register</a></li>
				<li><a href="userlist.php">Users</a></li>
			</ul>
		</nav>

    </body>
</html>
