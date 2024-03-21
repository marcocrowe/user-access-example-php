<?php require_once("app/autoload.php"); ?>
<?php
use UserAccessExample\Application;
use UserAccessExample\UserSessionManagement;
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
			<h2>User Account Details</h2>
			<?php UserSessionManagement::HandleUserAccess() ?>
			<?php
			$id = filter_input(INPUT_GET, UserAccountHtmlTagNames::Id);
			$userAccount = Application::$UserAccountRepository->GetUserAccountById($id);

			if($userAccount != null)
			{
				?>
				<form action="<?php echo UserAccountEditHtmlTagNames::FormActionPage; ?>" method="post">
					<table>
						<tr>
							<th colspan="2">
								<input name="<?php echo UserAccountEditHtmlTagNames::SaveButton; ?>" type="submit" value="Save" />
								<input name="<?php echo UserAccountEditHtmlTagNames::CancelButton; ?>" type="submit" value="Cancel" />
							</th>
						</tr>
						<tr>
							<td><label for="<?php echo UserAccountEditHtmlTagNames::UsernameInput; ?>">Username:</label></td>
							<td><input name="<?php echo UserAccountEditHtmlTagNames::UsernameInput; ?>" type="text" value="<?php echo $userAccount->getUsername(); ?>" /></td>
						</tr>
						<tr>
							<td><label for="<?php echo UserAccountEditHtmlTagNames::NameInput; ?>">Name:</label></td>
							<td><input name="<?php echo UserAccountEditHtmlTagNames::NameInput; ?>" type="text" value="<?php echo $userAccount->getName(); ?>" /></td>
						</tr>
						<tr>
							<td><label for="<?php echo UserAccountEditHtmlTagNames::EmailInput; ?>">e-mail:</label></td>
							<td><input name="<?php echo UserAccountEditHtmlTagNames::EmailInput; ?>" type="text" value="<?php echo $userAccount->getEmail(); ?>" /></td>
						</tr>
						<tr>
							<td><label for="<?php echo UserAccountEditHtmlTagNames::ActiveInput; ?>">Active:</label></td>
							<td><input name="<?php echo UserAccountEditHtmlTagNames::ActiveInput; ?>" type="checkbox" <?php echo $userAccount->getActive() ? "checked" : ""; ?> /></td>
						</tr>
					</table>
				</form>
				<?php
			}
			else
			{
				?>
				<h3>No User for Id(<?php echo $id; ?>) was found.</h3>
				<?php
			}
			?>
		</main>
    </body>
</html>
