<?php

abstract class UserAccountLoginResult
{
	//
	//	Public Static Fields
	//
	public const Fail = 0;
	public const Locked = 1;
	public const Success = 2;
	//
	//	Public Static Methods
	//
	public static function GetLoginResult(?UserAccount $userAccount): int
	{
		if($userAccount != null)
		{
			if($userAccount->getActive())
			{
				return UserAccountLoginResult::Success;
			}
			else
			{
				return UserAccountLoginResult::Locked;
			}
		}
		else
		{
			return UserAccountLoginResult::Fail;
		}
	}
	public static function GetLoginMessage(int $loginResult): string
	{
		switch($loginResult)
		{
			case UserAccountLoginResult::Success : return "Login Successful";
			case UserAccountLoginResult::Locked : return "User Login Disabled";
			case UserAccountLoginResult::Fail : return "Login Failed";
			default : return "I don't know what happened.";
		}
	}
}