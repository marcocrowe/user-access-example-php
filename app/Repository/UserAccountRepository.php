<?php

/**
 * Repository provides CRUD functionality for User Accounts
 */
interface UserAccountRepository
{
	public function CreateUserAccount(UserAccount $userAccount, string $password);
	//public function Delete(UserAccount $userAccount);
	//public function DeleteUserAccountById(int $userAccountId);
	public function GetUserAccountById(int $id): ?UserAccount;
	public function GetUserAccountByCredentials(string $username, string $password): ?UserAccount;
	public function GetUserAccounts(): array;
	//public function Update(UserAccount $userAccount);
}