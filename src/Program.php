<?php

require_once("SessionRepository/UserAccountSessionRepository.php");
require_once("UserSessionManagement.php");
require_once("WebPages.php");



session_start();

$userDatabase;

//$_SESSION[SessionKeys::UserDatabase] = null;

if(isset($_SESSION[SessionKeys::UserDatabase]))
{
	$userDatabase = $_SESSION[SessionKeys::UserDatabase];
}
else
{
	$userDatabase = new UserAccountSessionRepository();
	$_SESSION[SessionKeys::UserDatabase] = $userDatabase;
}
