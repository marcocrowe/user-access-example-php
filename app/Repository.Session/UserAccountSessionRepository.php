<?php

/**
 * Repository provides CRUD functionality for User Accounts held in Session Memory
 */
class UserAccountSessionRepository implements UserAccountRepository
{
	function __construct()
	{
		$this->activeUser = UserAccount::Construct(true, 1, "user@noreply.com", "user");
		$this->disabledUser = UserAccount::Construct(false, 2, "user1@noreply.com", "user1");
		$this->users = array($this->activeUser, $this->disabledUser);
	}
	//
	//	Public Constants
	//
	public const DefaultPassowrd = "password";
	//
	//	Public Methods
	//
	public function CreateUserAccount(UserAccount $userAccount, string $password)
	{
		$userAccount->setId(count($this->users) + 1);
		$this->SaltPassword($password);
		array_push($this->users, $userAccount);
	}
	public function GetUserAccountById($id): ?UserAccount
	{
		foreach($this->users as $user)
		{
			if($user->getId() == $id)
			{
				return $user;
			}
		}
		return null;
	}
	public function GetUserAccountByCredentials(string $username, string $password): ?UserAccount
	{
		foreach($this->users as $user)
		{
			if(strcmp($username, $user->getUsername()) == 0 && strcmp($password, self::DefaultPassowrd) == 0)
			{
				return $user;
			}
		}
		return null;
	}
	public function SaltPassword(string $password): string
	{
		return $password;
	}
	//
	//	Public Methods - Users
	//
	public function getActiveUser(): UserAccount
	{
		return $this->activeUser;
	}
	public function getDisabledUser(): UserAccount
	{
		return $this->disabledUser;
	}
	public function GetUserAccounts(): array
	{
		return $this->users;
	}
	//
	//	Private Fields
	//
	private UserAccount $activeUser;
	private UserAccount $disabledUser;
	private array $users;
}