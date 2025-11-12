<?php


spl_autoload_register(function ($model) {
    $path = __DIR__ . '/../app/models/' . $model . '.php';
    if (file_exists($path)) {
        require_once $path;
    }
});

require_once __DIR__ . '/../app/helpers/viewHelper.php';
require_once __DIR__ . '/../app/helpers/authHelper.php'; 

session_start();

$_SESSION['user_id'] = 3;
$user = Usuario::getUsuarioCompleto($_SESSION['user_id']);
$_SESSION['user_avatar'] = $user["user_avatar"];
$_SESSION['user_name'] = $user["user_name"];
$_SESSION['user_tipo'] = $user["user_tipo"];


$uri = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

$routes = [
    ''          => '../app/controllers/homeController.php',
    '/profile'  => '../app/controllers/profileController.php',
    '/logout'   => '../app/controllers/logoutController.php', 
    '/aulas' => '../app/controllers/aulasController.php'
];

if (array_key_exists($uri, $routes)) {
    require_once $routes[$uri];

    $controller = basename($routes[$uri], '.php');
    $function   = $controller;
    if (function_exists($function)) {
        $function();
    } else {
        http_response_code(500);
        echo "Erro interno: função do controller não encontrada.";
    }
} else {
    http_response_code(404);
    echo "Página não encontrada.";
}