<?php

namespace UserAccessExample;

class UserSessionManagement
{
	public static function HandleUserAccess()
	{
		if(!self::UserIsLoggedIn())
		{
			echo "<h1>No User logged in, redirecting... redirect failed.  Security breached.<h1>";
		}
	}
	public static function UserIsLoggedIn(): bool
	{
		return self::GetCurrentUser() != null;
	}
	public static function GetCurrentUser(): ?UserAccount
	{
		if(isset($_SESSION[SessionKeys::User]))
			return $_SESSION[SessionKeys::User];
		else
			return null;
	}
	public static function LoginUser(UserAccount $userAccount): void
	{
		$_SESSION[SessionKeys::User] = $userAccount;
	}
	public static function LogoutCurrentUser()
	{
		$_SESSION[SessionKeys::User] = null;
	}
}