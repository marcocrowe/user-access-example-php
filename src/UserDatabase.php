<?php

require_once("UserAccount.php");

class UserDatabase
{

//private $user = new UserAccount("user", "user@roreply.com", true);
//private $users = array(new UserAccount());

	function Login($username, $password)
	{
		$user = new UserAccount("user", "user@roreply.com", true);
		$disabledUser = new UserAccount("user1", "user@roreply.com", false);

		if (strcmp($username, $user->getUsername()) == 0 && strcmp($password, "password") == 0)
		{
			return $user;
		} else if (($username == $disabledUser->getUsername() && $password == "password"))
		{
			return $disabledUser;
		} else
		{
			return null;
		}
	}

	function Register($username, $email, $password)
	{
		
	}

}
