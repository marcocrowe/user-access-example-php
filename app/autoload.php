<?php

declare(strict_types=1);

//
// app/AccessManagement/
//
require_once 'app/AccessManagement/SessionKeys.php';
require_once 'app/AccessManagement/UserAccountLoginResult.php';
require_once 'app/AccessManagement/UserSessionManagement.php';
//
// app/DTOs/
//
require_once 'app/DTOs/UserAccount.php';
//
// app/Repository/
//
require_once 'app/Repository/UserAccountRepository.php';
//
// app/Repository.Database.Schema/
//
require_once 'app/RepositoryDatabaseSchema/DatabaseSchema.php';
//
// app/Repository.MySQL/
//
require_once 'app/Repository.MySQL/UserAccountMySQLRepository.php';
//
// app/Repository.Session/
//
require_once 'app/Repository.Session/UserAccountSessionRepository.php';
//
// app/Website/
//
require_once 'app/Website/MenuItem.php';
require_once 'app/Website/WebPage.php';
require_once 'app/Website/Website.php';
//
// app/Website.Forms/
//
require_once 'app/Website.Forms/LoginHtmlTagNames.php';
require_once 'app/Website.Forms/RegisterHtmlTagNames.php';
require_once 'app/Website.Forms/UserAccountEditHtmlTagNames.php';
require_once 'app/Website.Forms/UserAccountHtmlTagNames.php';
//
// app/
//
require_once 'app/Application.php';
require_once 'app/WebPages.php';
//
//
//
use UserAccessExample\UserSessionManagement;
