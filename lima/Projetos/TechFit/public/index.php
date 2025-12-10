<?php

require_once __DIR__ . '/../app/bootstrap.php';

// Captura a URI atual
$uri = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// Rotas com configuração de autenticação
// 'auth' => false = público, 'auth' => true = requer login, 'auth' => 'funcionario' = requer funcionário
$routes = [
    ''                      => ['path' => 'home/homeController', 'controller' => 'homeController', 'auth' => false],
    '/login'                => ['path' => 'auth/loginController', 'controller' => 'loginController', 'auth' => false],
    '/cadastro'             => ['path' => 'auth/loginController', 'controller' => 'loginController', 'auth' => false],
    '/logout'               => ['path' => 'auth/logoutController', 'controller' => 'logoutController', 'auth' => true],
    '/sobre'                => ['path' => 'home/sobreController', 'controller' => 'sobreController', 'auth' => false],
    '/contato'              => ['path' => 'home/contatoController', 'controller' => 'contatoController', 'auth' => false],
    '/contato/send'         => ['path' => 'home/contatoController', 'controller' => 'contatoController', 'auth' => false],
    '/planos'               => ['path' => 'home/planosController', 'controller' => 'planosController', 'auth' => false],
    '/faq'                  => ['path'=> 'home/faqController', 'controller' => 'faqController', 'auth'=> false],
    '/pagamento'            => ['path' => null, 'controller' => null, 'auth' => true],
    '/pagamentos'           => ['path' => null, 'controller' => null, 'auth' => true],

    // Rotas protegidas (requerem autenticação)
    '/profile'              => ['path' => 'profile/profileController' , 'controller' => 'profileController', 'auth' => true],
    '/aulas'                => ['path' => 'profile/aulasController' , 'controller' => 'aulasController', 'auth' => true],
    '/aulas/agendar'        => ['path' => 'profile/aulasController' , 'controller' => 'aulasController', 'auth' => true],
    '/comunicados'          => ['path' => 'profile/comunicadoPublicController' , 'controller' => 'comunicadoPublicController', 'auth' => true],
    '/adm/comunicados'      => ['path' => 'admin/comunicadoAdmController' , 'controller' => 'comunicadoAdmController', 'auth' => 'funcionario'],
    '/adm/relatorios'       => ['path' => 'admin/adminRelatoriosController' , 'controller' => 'adminRelatoriosController', 'auth' => 'funcionario'],
    '/admin'                => ['path' => 'admin/adminController' , 'controller' => 'adminController', 'auth' => 'funcionario'],
    '/admin/painel'         => ['path' => 'admin/adminController' , 'controller' => 'adminController', 'auth' => 'funcionario'],
    '/admin/relatorios'     => ['path' => 'admin/adminRelatoriosController' , 'controller' => 'adminRelatoriosController', 'auth' => 'funcionario'],
];

if (!array_key_exists($uri, $routes)) {
    http_response_code(404);
    echo "Página não encontrada.";
    exit;
}

$route = $routes[$uri];

// Verifica autenticação antes de carregar o controller ou página
if ($route['auth'] === true) {
    requireAuth();
} elseif ($route['auth'] === 'funcionario') {
    requireFuncionario();
}

if ($uri === '/pagamento') {
    require __DIR__ . '/pagamento.php';
    exit;
}

if ($uri === '/pagamentos') {
    require __DIR__ . '/pagamentos.php';
    exit;
}

require_once __DIR__. "/../app/controllers/" .$route['path'] . ".php";

$controller = $route['controller'];
$function   = $controller;

if (function_exists($function)) {
    $function(); 
} else {
    http_response_code(500);
    echo "Erro interno: função do controller não encontrada.";
}

