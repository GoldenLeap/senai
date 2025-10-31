<?php
  function autoload($file){
    include __DIR__ . '/../app/models/'. $file. ".php";
    include __DIR__ . '/../app/helpers/' . $file. ".php";
  }
  spl_autoload_register('autoload');
?>


<?php
require_once '../app/helpers/viewHelper.php';
require_once '../app/models/Connect.php';
require_once '../app/helpers/authHelper.php'; 
session_start();
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$_SESSION['user_id'] = 3;
$_SESSION['user_name'] = 'Carlos Lima';
$_SESSION['user_tipo'] = 'Funcionario';
$_SESSION['user_avatar'] = '/images/upload/avatars/avatar.png';
$usuario = verificarUsuario();


switch ($uri) {
  case '/':
    require_once '../app/controllers/homeController.php';
    homeController();
    break;
  case '/profile.php':
    require_once '../app/controllers/profileController.php';
    profileController();
    break;
  case '/admin/painel':
    require_once '../app/controllers/adminController.php';
  default:
    http_response_code(404);
    echo "Página não encontrada";
    break;
}
