<?php

namespace UserAccessExample\Repository;

use UserAccessExample\Utilities\PasswordUtility;

class UserAccount
{
	public static function construct(bool $isActive, int $id, string $email, string $username): UserAccount
	{
		$userAccount = new UserAccount();
		$userAccount->isActive = $isActive;
		$userAccount->id = $id;
		$userAccount->email = $email;
		$userAccount->username = $username;
		return $userAccount;
	}
	/// Properties ///
	/**
	 * The Email Address for the User Account
	 * @return string The Email Address
	 */
	public function getEmail(): string
	{
		return $this->email;
	}
	public function getHashedPassword(): string
	{
		return $this->hashedPassword;
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
	public function isActive(): bool
	{
		return $this->isActive;
	}
	public function setActive(bool $active): void
	{
		$this->isActive = $active;
	}
	public function setEmail(string $email): void
	{
		$this->email = $email;
	}
	public function setHashedPassword(string $hashedPassword): void
	{
		$this->hashedPassword = $hashedPassword;
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
	/**
	 * Sets the password for the User Account
	 * @param string $password The password to set
	 */
	public function setPassword(string $password): void
	{
		$this->hashedPassword = PasswordUtility::hashPassword($password);
	}
	//
	// Private Fields
	//
	private bool $isActive = true;
	private string $email = "";
	private int $id = 0;
	private string $name = "";
	private string $username = "";
	private string $hashedPassword = "";
}
