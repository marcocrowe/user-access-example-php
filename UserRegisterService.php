<?php require_once "app/autoload.php"; ?>
<?php

use UserAccessExample\Application;
use UserAccessExample\DTOs\UserAccount;
use UserAccessExample\Web\WebPages;
use UserAccessExample\Web\RegisterHtmlTagNames;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Account Repository</title>
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
        <?php
        $registerButton = filter_input(INPUT_POST, RegisterHtmlTagNames::RegisterButton);
        if (isset($registerButton)) {
        ?>
            <h2>Register Button Pressed</h2>
            <?php
            $username = filter_input(INPUT_POST, RegisterHtmlTagNames::UsernameInput);
            $name = filter_input(INPUT_POST, RegisterHtmlTagNames::NameInput);
            $email = filter_input(INPUT_POST, RegisterHtmlTagNames::EmailInput);
            $password = filter_input(INPUT_POST, RegisterHtmlTagNames::PasswordInput);
            $confirmPassword = filter_input(INPUT_POST, RegisterHtmlTagNames::ConfirmPasswordInput);

            $userAccount = UserAccount::construct(true, 0, $email, $username);
            $userAccount->setName($name);

            Application::$getUserAccountRepository()->createUserAccount($userAccount, $password);
            ?>
            <h2>Username:<?php echo $userAccount->getUsername(); ?></h2>
            <h2>Name:<?php echo $userAccount->getName(); ?></h2>
            <h2>email:<?php echo $userAccount->getEmail(); ?></h2>
            <h2>Password:<?php echo $password; ?></h2>
            <h2>Confirm Password:<?php echo $confirmPassword; ?></h2>
        <?php
        }
        ?>
    </main>
</body>

</html>
