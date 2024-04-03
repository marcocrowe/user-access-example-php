<?php

namespace UserAccessExample;

use UserAccessExample\DTOs\UserAccount;
class UserSessionManagement
{
    public static function handleUserAccess()
    {
        if (!self::isUserLoggedIn()) {
            echo "<h1>No User logged in, redirecting... redirect failed.  Security breached.<h1>";
        }
    }
    public static function isUserLoggedIn(): bool
    {
        return self::getCurrentUser() != null;
    }
    public static function getCurrentUser(): ?UserAccount
    {
        if (isset($_SESSION[SessionKeys::User]))
            return $_SESSION[SessionKeys::User];
        else
            return null;
    }
    public static function loginUser(UserAccount $userAccount): void
    {
        $_SESSION[SessionKeys::User] = $userAccount;
    }
    public static function logoutCurrentUser()
    {
        $_SESSION[SessionKeys::User] = null;
    }
}
