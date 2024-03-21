<?php

require_once("src/DataObjects/UserAccount.php");
class UserAccountRepository
{
	function __construct()
	{
		$this->activeUser = new UserAccount("user", "user@roreply.com", true);
		$this->disabledUser = new UserAccount("user1", "user@roreply.comcom", false);

		$this->users = array($this->activeUser, $this->disabledUser);
	}
	//
	//	Public Constants
	//
	public const DefaultPassowrd = "password";
	//
	//	Public Methods
	//
	public function Login(string $username, string $password)
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
	public function Register(string $username, string $email, string $password)
	{
		$newUser = new UserAccount($username, $email, true);
		$this->SaltPassword($password);
		array_push($this->users, $newUser);
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
	public function getUsers(): array
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