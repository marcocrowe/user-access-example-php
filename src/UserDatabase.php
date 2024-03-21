<?php

require_once("UserAccount.php");

class UserDatabase
{

	public const DefaultPassowrd = "password";
	public function getActiveUser()
	{
		return $this->activeUser;
	}

	public function getDisabledUser()
	{
		return $this->disabledUser;
	}

		function __construct()
	{
		$this->activeUser = new UserAccount("user", "user@roreply.com", true);
		$this->disabledUser = new UserAccount("user1", "user@roreply.comcom", false);

		$this->users = array($this->activeUser, $this->disabledUser);
	}

	private $activeUser;
	private $disabledUser;
	private $users;

//private $users = array(new UserAccount());

	function Login($username, $password)
	{
		foreach ($this->users as $user)
		{
			if (strcmp($username, $user->getUsername()) == 0 && strcmp($password, self::DefaultPassowrd) == 0)
				return $user;
		}
		return null;
	}

	function Register($username, $email, $password)
	{
		$newUser = new UserAccount($username, $password, true);
		array_push($this->users, $newUser);
	}

}
