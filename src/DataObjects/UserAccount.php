<?php

declare(strict_types=1);

class UserAccount
{
	function __construct()
	{
		
	}
	public static function Construct(bool $active, int $id, string $email, string $username): UserAccount
	{
		$userAccount = new UserAccount();
		$userAccount->active = $active;
		$userAccount->id = $id;
		$userAccount->email = $email;
		$userAccount->username = $username;
		return $userAccount;
	}
	//
	//	Public Properties
	//
	public function getActive(): bool
	{
		return $this->active;
	}
	public function getEmail(): string
	{
		return $this->email;
	}
	public function getId(): int
	{
		return $this->id;
	}
	public function getName(): string
	{
		return $this->name;
	}
	public function getUsername(): string
	{
		return $this->username;
	}
	public function setActive(bool $active): void
	{
		$this->active = $active;
	}
	public function setEmail(string $email): void
	{
		$this->email = $email;
	}
	public function setId(int $id): void
	{
		$this->id = $id;
	}
	public function setName(string $name): void
	{
		$this->name = $name;
	}
	public function setUsername(string $username): void
	{
		$this->username = $username;
	}
	//
	//	Private Fields
	//
	private bool $active = true;
	private string $email = "";
	private int $id = 0;
	private string $name = "";
	private string $username = "";
}