<?php

require_once("SessionRepository/UserAccountSessionRepository.php");


$userDatabaseSessionKey = "database";

session_start();

$userDatabase;

$_SESSION[$userDatabaseSessionKey]= null;

if(isset($_SESSION[$userDatabaseSessionKey]))
{
	$userDatabase = $_SESSION[$userDatabaseSessionKey];
}
else
{
	$userDatabase = new UserAccountSessionRepository();
	$_SESSION[$userDatabaseSessionKey] = $userDatabase;
}
