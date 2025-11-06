<?php
  function autoload($models){
    include __DIR__ . '/../app/models/'. $models. ".php";
  }
  spl_autoload_register('autoload');
?>


<?php
require_once '../app/helpers/viewHelper.php';
session_start();  
//$logado = isset($_SESSION['user_id']);
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$_SESSION['user_id'] = 1;


switch ($uri) {
  case '/':
    require_once '../app/controllers/homeController.php';
    homeController();
    break;
  case '/profile.php':
    require_once '../app/controllers/profileController.php';
    profileController();
    break;
  default:
    http_response_code(404);
    echo "Página não encontrada";
    break;
}
