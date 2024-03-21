<?php

declare(strict_types=1);
require_once("src/DataObjects/UserAccount.php");
require_once("src/Repository/UserAccountRepository.php");

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
	public function Login(string $username, string $password): ?UserAccount
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
	public function CreateUserAccount(UserAccount $userAccount, string $password)
	{
		$this->SaltPassword($password);
		array_push($this->users, $userAccount);
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
	private $activeUser;
	private $disabledUser;
	private $users;
}