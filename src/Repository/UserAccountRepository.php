<?php

declare(strict_types=1);

require_once("src/DataObjects/UserAccount.php");

interface UserAccountRepository
{
	public function CreateUserAccount(UserAccount $userAccount, string $password);
//	public function Delete(UserAccount $userAccount);
	public function GetUserAccountById(int $id): ?UserAccount;
	public function GetUserAccounts(): array;
	public function Login(string $username, string $password): ?UserAccount;
//	public function Update(UserAccount $userAccount);
}