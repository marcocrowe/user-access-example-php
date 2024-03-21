<?php

require_once("Repository/UserAccountRepository.php");


$userDatabaseSessionKey = "database";

session_start();

$userDatabase;


if(isset($_SESSION[$userDatabaseSessionKey]))
{
	$userDatabase = $_SESSION[$userDatabaseSessionKey];
}
else
{
	$userDatabase = new UserAccountRepository();
	$_SESSION[$userDatabaseSessionKey] = $userDatabase;
}
