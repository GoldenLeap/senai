<?php

function render(string $view, array $data = []){
    extract($data);
    ob_start();
    require __DIR__ . "/../view/$view.php";
    $conteudo = ob_get_clean();
    require __DIR__ . "/../view/template/base.php";
}