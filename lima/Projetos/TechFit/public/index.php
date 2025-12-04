<?php

require_once __DIR__ . '/../app/bootstrap.php';

// Captura a URI atual
$uri = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// Rotas com configuração de autenticação
// 'auth' => false = público, 'auth' => true = requer login, 'auth' => 'funcionario' = requer funcionário
$routes = [
    ''                      => ['controller' => 'homeController', 'auth' => false],
    '/login'                => ['controller' => 'loginController', 'auth' => false],
    '/logout'               => ['controller' => 'logoutController', 'auth' => true],
    '/sobre'                => ['controller' => 'sobreController', 'auth' => false],
    '/contato'              => ['controller' => 'contatoController', 'auth' => false],
    '/contato/send'         => ['controller' => 'contatoController', 'auth' => false],
    '/planos'=> ['controller' => 'planosController', 'auth' => false],
    '/faq' => ['controller' => 'faqController', 'auth'=> false],
    
    // Rotas protegidas (requerem autenticação)
    '/profile'              => ['controller' => 'profileController', 'auth' => true],
    '/aulas'                => ['controller' => 'aulasController', 'auth' => true],
    '/comunicados'          => ['controller' => 'comunicadoPublicController', 'auth' => true],
    '/adm/comunicados'      => ['controller' => 'comunicadoAdmController', 'auth' => 'funcionario'],
];

if (!array_key_exists($uri, $routes)) {
    http_response_code(404);
    echo "Página não encontrada.";
    exit;
}

$route = $routes[$uri];

// Verifica autenticação antes de carregar o controller
if ($route['auth'] === true) {
    requireAuth();
} elseif ($route['auth'] === 'funcionario') {
    requireFuncionario();
}

require_once __DIR__ . '/../app/controllers/' . $route['controller'] . '.php';

$controller = $route['controller'];
$function   = $controller;

    if (function_exists($function)) {
        $function(); 
    } else {
        http_response_code(500);
        echo "Erro interno: função do controller não encontrada.";
    }

