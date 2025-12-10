<?php 

function planosController(): void
{
    $planos = Planos::getAll();

    $data = [
        'titulo' => 'Planos',
        'planos' => $planos,
        'headExtras' => '<link rel="stylesheet" href="/assets/css/Login_Cadastro.css">'
    ];

    render('/home/planosView', $data['titulo'], $data);
}
