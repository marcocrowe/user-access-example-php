<?php

namespace UserAccessExample\Repository;

/**
 * Repository provides CRUD functionality for User Accounts
 */
interface UserAccountRepository
{
    /**
     * Create a User Account
     * @param UserAccount $userAccount The User Account to create
     * @param string $password The password for the User Account
     */
    public function createUserAccount(UserAccount $userAccount, string $password);
	/**
	 * Delete a User Account
	 * @param int $userAccountId The User Account Id to delete
	 * @return bool True if the User Account was deleted, otherwise false
	 */
    public function deleteUserAccount(UserAccount $userAccount);
	/**
	 * Delete a User Account by Id
	 * @param int $userAccountId The User Account Id to delete
	 * @return bool True if the User Account was deleted, otherwise false
	 */
    public function deleteUserAccountById(int $userAccountId);
    public function getUserAccountByCredentials(string $username, string $password): ?UserAccount;
    public function getUserAccountById(int $id): ?UserAccount;
    public function getUserAccounts(): array;
    public function updateUserAccount(UserAccount $userAccount);
}
