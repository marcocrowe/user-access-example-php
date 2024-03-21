<?php

class UserAccount
{
	function __construct($username, $emailAddress, $active)
	{
		$this->username = $username;
		$this->emailAddress = $emailAddress;
		$this->active = $active;
	}
	//
	//	Public Properties
	//
	public function getUsername(): string
	{
		return $this->username;
	}
	public function getEmail(): string
	{
		return $this->emailAddress;
	}
	public function getActive(): string
	{
		return $this->active;
	}
	public function setUsername(string $username): void
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
	//
	//	Private Fields
	//
	private $username;
	private $emailAddress;
	private $active;
}