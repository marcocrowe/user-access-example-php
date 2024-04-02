<?php require_once "app/autoload.php"; ?>
<?php
use UserAccessExample\Application;
use UserAccessExample\Repository\Session\UserAccountSessionRepository;
use UserAccessExample\Web\LoginHtmlTagNames;
use UserAccessExample\Web\WebPages;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>PHP Access Web Example: Login</title>
    <meta name="author" content="Mark Crowe">
    <meta name="description" content="PHP Access Web Example">
    <meta name="keywords" content="PHP, User, Login, Security, Session, Database, MySQL">
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <link rel="shortcut icon" href="resource/icon/favicon.ico" />
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
        <form action="<?php echo LoginHtmlTagNames::FormActionPage; ?>" method="post">
            <table>
                <caption>Login</caption>
                <tr>
                    <th scope="row">Username:</th>
                    <td><input name="<?php echo LoginHtmlTagNames::UsernameInput; ?>" type="text" /></td>
                </tr>
                <tr>
                    <th scope="row">Password:</th>
                    <td><input name="<?php echo LoginHtmlTagNames::PasswordInput; ?>" type="password" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input name="<?php echo LoginHtmlTagNames::LoginButton; ?>" type="submit" value="Login" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input name="OtherButton" type="submit" value="Other Button" /></td>
                </tr>
            </table>
        </form>

        <table>
            <caption>Test User Accounts</caption>
            <tr>
                <td colspan="2">Active User Account</td>
            </tr>
            <tr>
                <th scope="row">Username:</td>
                <td><?php echo Application::$UserAccountRepository->getActiveUser()->getUsername(); ?></td>
            </tr>
            <tr>
                <th scope="row">Password:</td>
                <td><?php echo UserAccountSessionRepository::DefaultPassword; ?></td>
            </tr>
            <tr>
                <td colspan="2">Disabled User Account</td>
            </tr>
            <tr>
                <th scope="row">Username:</td>
                <td><?php echo Application::$UserAccountRepository->getDisabledUser()->getUsername(); ?></td>
            </tr>
            <tr>
                <th scope="row">Password:</td>
                <td><?php echo UserAccountSessionRepository::DefaultPassword; ?></td>
            </tr>
            <tr>
                <td colspan="2">Incorrect Login details</td>
            </tr>
            <tr>
                <th scope="row">Username:</td>
                <td>anything</td>
            </tr>
            <tr>
                <th scope="row">Password:</td>
                <td>anything</td>
            </tr>
        </table>
    </main>
</body>

</html>
