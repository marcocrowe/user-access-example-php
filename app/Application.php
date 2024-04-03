<?php

namespace UserAccessExample;

use UserAccessExample\Repository\Session\UserAccountSessionRepository;

/**
 * User Access Example Application, start
 */
abstract class Application
{
    /**
     * Get the User Account Repository
     * @return UserAccountSessionRepository
     */
    public static function getUserAccountRepository(): UserAccountSessionRepository
    {
        return self::$userAccountRepository;
    }
    /**
     * User Account Repository
     * @return UserAccountSessionRepository
     */
    private static UserAccountSessionRepository $userAccountRepository;
    /**
     * Main Call to start application
     */
    public static function main()
    {
        session_start();
        //$_SESSION[SessionKeys::UserDatabase] = null;
        if (isset($_SESSION[SessionKeys::UserDatabase]))
            self::$userAccountRepository = $_SESSION[SessionKeys::UserDatabase];
        else
        {
            self::$userAccountRepository = new UserAccountSessionRepository();
            $_SESSION[SessionKeys::UserDatabase] = self::$userAccountRepository;
        }
    }
}
//
// Application start
//
Application::main();
