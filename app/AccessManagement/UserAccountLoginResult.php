<?php

namespace UserAccessExample;

use UserAccessExample\DTOs\UserAccount;
abstract class UserAccountLoginResult
{
    //
    // Public Static Fields
    //
    public const Fail = 0;
    public const Locked = 1;
    public const Success = 2;
    //
    // Public Static Methods
    //
    public static function getLoginResult(?UserAccount $userAccount): int
    {
        if ($userAccount != null) {
            if ($userAccount->isActive()) {
                return UserAccountLoginResult::Success;
            } else {
                return UserAccountLoginResult::Locked;
            }
        } else {
            return UserAccountLoginResult::Fail;
        }
    }
    public static function getLoginMessage(int $loginResult): string
    {
        switch ($loginResult) {
            case UserAccountLoginResult::Success:
                return "Login Successful";
            case UserAccountLoginResult::Locked:
                return "User Login Disabled";
            case UserAccountLoginResult::Fail:
                return "Login Failed";
            default:
                return "I don't know what happened.";
        }
    }
}
