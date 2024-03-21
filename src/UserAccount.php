<?php

class UserAccount
{

	function __construct($username, $emailAddress, $active)
	{
		$this->username = $username;
		$this->emailAddress = $emailAddress;
		$this->active = $active;
	}

	private $username;
	private $emailAddress;
	private $active;

	public function getUsername()
	{
		return $this->username;
	}

	public function getEmail()
	{
		return $this->emailAddress;
	}

	public function getActive()
	{
		return $this->active;
	}

	public function setUsername($username): void
	{
		$this->username = $username;
	}

	public function setEmail($email): void
	{
		$this->emailAddress = $email;
	}

	public function setActive($active): void
	{
		$this->active = $active;
	}

}
