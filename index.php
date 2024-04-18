<?php
// Include routes.php
$routes = require_once __DIR__ . '/routes.php';

// Handle request and dispatch to appropriate controller method based on the route
$uri = $_SERVER['REQUEST_URI'];

if (array_key_exists($uri, $routes)) {
    $controllerAction = $routes[$uri];
    list($controllerName, $methodName) = explode('@', $controllerAction);

    // Include controller file
    require_once __DIR__ . '/app/WebControllers/' . $controllerName . '.php';

    // Create controller instance
    $controller = new $controllerName();

    // Call controller method
    $controller->$methodName();
} else {
    // Handle 404 Not Found
    echo '404 Not Found';
}
