<?php

namespace UserAccessExample;

use UserAccessExample\Repository\Session\UserAccountSessionRepository;
/**
 * User Access Example Application, start
 */
abstract class Application
{
	public static UserAccountSessionRepository $UserAccountRepository;
	//
	//	Methods
	//
	/**
	 * Main Call to start application
	 */
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
//
//	Application start
//
Application::Main();
