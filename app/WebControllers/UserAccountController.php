<?php

namespace UserAccessExample\WebControllers;

use UserAccessExample\DTOs\UserAccount;
use UserAccessExample\Services\UserAccountService;

/**
 * User Account Web Controller
 */
class UserAccountWebController
{
    /**
     * A UserAccount Service
     * @var UserAccountService
     */
    private UserAccountService $userAccountService;

    /**
     * Create a new UserAccountWebController
     * @param UserAccountService $userAccountService A UserAccount Service
     */
    public function __construct(UserAccountService $userAccountService)
    {
        $this->userAccountService = $userAccountService;
    }

    public function getUserAccounts(): array
    {
        $userAccounts = $this->userAccountService->getUserAccounts();
        include_once __DIR__ . '/../user-accounts.php';
    }
}
