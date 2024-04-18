<?php

$routes = [
    '/' => 'HomeController@index',
    '/user-accounts' => 'UserAccountController@getUserAccounts',
];

return $routes;
