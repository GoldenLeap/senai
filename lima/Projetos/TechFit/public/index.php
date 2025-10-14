<?php
require_once '../app/helpers/viewHelper.php';
session_start();
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($uri) {
  case '/':
    require_once '../app/controllers/homeController.php';
    homeController();
    break;
  default:
    http_response_code(404);
    echo "Página não encontrada";
    break;

}