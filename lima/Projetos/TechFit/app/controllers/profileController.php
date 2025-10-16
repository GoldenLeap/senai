<?php
function profileController(){
    $data = [
        'nome' => 'Cleitinho',
        'tipo' => 'aluno',
        'headExtras' => <<<HTML
    <link rel="stylesheet" href="./assets/css/profile.css" />
    <link rel="stylesheet" href="./assets/css/utility.css"/>
HTML
    ];
    render('profileView', 'Perfil', $data, );
}