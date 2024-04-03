<?php require_once "app/autoload.php"; ?>
<?php

use UserAccessExample\Web\WebPages;
use UserAccessExample\Web\RegisterHtmlTagNames;
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
        <form action="<?php echo RegisterHtmlTagNames::FormActionPage; ?>" method="post">
            <table>
                <caption>Register</caption>
                <tr>
                    <th scope="row">Username:</td>
                    <td><input name="<?php echo RegisterHtmlTagNames::UsernameInput; ?>" type="text" /></td>
                </tr>
                <tr>
                    <th scope="row">Name:</td>
                    <td><input name="<?php echo RegisterHtmlTagNames::NameInput; ?>" type="text" /></td>
                </tr>
                <tr>
                    <th scope="row">e-mail:</td>
                    <td><input name="<?php echo RegisterHtmlTagNames::EmailInput; ?>" type="email" /></td>
                </tr>
                <tr>
                    <th scope="row">Password:</td>
                    <td><input name="<?php echo RegisterHtmlTagNames::PasswordInput; ?>" type="password" /></td>
                </tr>
                <tr>
                    <th scope="row">Confirm Password:</td>
                    <td><input name="<?php echo RegisterHtmlTagNames::ConfirmPasswordInput; ?>" type="password" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input name="<?php echo RegisterHtmlTagNames::RegisterButton; ?>" type="submit" value="Register" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input name="OtherButton" type="submit" value="Other Button" /></td>
                </tr>
            </table>
        </form>
    </main>
</body>

</html>
