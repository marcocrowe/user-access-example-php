<?php

Application::Main();
/**
 * Description of Application
 */
class Application
{
	public static UserAccountSessionRepository $UserAccountRepository;
	public static function Main()
	{
		session_start();
		//$_SESSION[SessionKeys::UserDatabase] = null;
		if(isset($_SESSION[SessionKeys::UserDatabase]))
		{
			self::$UserAccountRepository = $_SESSION[SessionKeys::UserDatabase];
		}
		else
		{
			self::$UserAccountRepository = new UserAccountSessionRepository();
			$_SESSION[SessionKeys::UserDatabase] = self::$UserAccountRepository;
		}
	}
}