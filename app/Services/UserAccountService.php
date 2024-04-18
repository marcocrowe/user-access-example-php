<?php

namespace UserAccessExample\Services;

use UserAccessExample\DTOs\UserAccount;
use UserAccessExample\Repository\UserAccountRepository;
use UserAccessExample\Repository\UserAccountTable;

/**
 * User Account Service
 */
class UserAccountService
{
    /**
     * A UserAccount Repository
     * @var UserAccountRepository
     */
    private UserAccountRepository $userAccountRepository;

    /**
     * Create a new UserAccountService
     */
    public function __construct(UserAccountRepository $userAccountRepository)
    {
        $this->userAccountRepository = $userAccountRepository;
    }

    /**
     * Create a User Account
     * @param UserAccount $userAccount The User Account to create
     * @param string $password The password for the User Account
     * @return bool True if the User Account was created, otherwise false
     */
    public function createUserAccount(UserAccount $userAccount, string $password): UserAccount
    {
        return $this->userAccountRepository->createUserAccount($userAccount, $password);
    }

    public function deleteUserAccount(UserAccount $userAccount)
    {
        $this->userAccountRepository->deleteUserAccount($userAccount);
    }

    public function deleteUserAccountById(int $userAccountId)
    {
        $this->userAccountRepository->deleteUserAccountById($userAccountId);
    }

    public function getUserAccountById(int $userAccountId): ?UserAccount
    {
        return $this->userAccountRepository->getUserAccountById($userAccountId);
    }

    /**
     * Get a User Accounts
     * @return array[UserAccount] The User Accounts
     */
    public function getUserAccounts(): array
    {
        return $this->userAccountRepository->getUserAccounts();
    }

    public function updateUserAccount(UserAccount $userAccount): bool
    {
        return $this->userAccountRepository->updateUserAccount($userAccount);
    }

}
