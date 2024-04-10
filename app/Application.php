<?php

namespace UserAccessExample;

use UserAccessExample\Repository\UserAccountRepository;
use UserAccessExample\Repository\MySQL\UserAccountMySQLRepository;
use PDO;

/**
 * User Access Example Application, start
 */
abstract class Application
{
    /**
     * Get the User Account Repository
     * @return UserAccountMySQLRepository
     */
    public static function getUserAccountRepository(): UserAccountRepository
    {
        return self::$userAccountRepository;
    }
    /**
     * User Account Repository
     * @return UserAccountMySQLRepository
     */
    private static ?UserAccountMySQLRepository $userAccountRepository = null;
    /**
     * Main Call to start application
     */
    public static function main()
    {
        if (self::$userAccountRepository != null)
            return;
        $servername = "localhost";
        $username = "root";
        $password = "letmein";
        $dbname = "useraccesswebexample";

        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";

        self::$userAccountRepository = new UserAccountMySQLRepository($connection);
    }
}
//
// Application start
//
Application::main();
