<?php require_once "app/autoload.php"; ?>
<?php

use UserAccessExample\Application;
use UserAccessExample\UserSessionManagement;
use UserAccessExample\Web\WebPages;
use UserAccessExample\Web\UserAccountHtmlTagNames;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>PHP Access Web Example: Login</title>
    <!--<Meta Content>-->
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
        <?php UserSessionManagement::handleUserAccess() ?>
        <?php
        $id = filter_input(INPUT_GET, UserAccountHtmlTagNames::Id);
        $userAccount = Application::$getUserAccountRepository()->GetUserAccountById($id);

        if ($userAccount != null) {
        ?>
            <table>
                <caption>User Account Details</caption>
                <tr>
                    <th>Username:</th>
                    <td><?php echo $userAccount->getUsername(); ?></td>
                </tr>
                <tr>
                    <th>Name:</th>
                    <td><?php echo $userAccount->getName(); ?></td>
                </tr>
                <tr>
                    <th>e-mail:</th>
                    <td><?php echo $userAccount->getEmail(); ?></td>
                </tr>
                <tr>
                    <th>Active:</th>
                    <td><?php echo json_encode($userAccount->isActive()); ?></td>
                </tr>
            </table>
        <?php
        } else {
        ?>
            <h3>No User for Id(<?php echo $id; ?>) was found.</h3>
        <?php
        }
        ?>
    </main>
</body>

</html>
