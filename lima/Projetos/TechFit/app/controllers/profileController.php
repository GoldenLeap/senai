<?php
require_once '../app/controllers/agendaController.php';


function profileController()
{    
    $usuario = verificarUsuario();
    $currPage = $_GET['page'] ?? '';

    $data = [
        'user_pfp' =>  $usuario['user_avatar'],
        'user_name' => $usuario['user_name'],
        'user_tipo' => $usuario['user_tipo'],
        'headExtras' => <<<HTML
    <link rel="stylesheet" href="./assets/css/profile.css" />
    <link rel="stylesheet" href="./assets/css/utility.css"/>
HTML
    ];
    $data['pageContent'] = carregarConteudoPagina($currPage);
    render('profileView', 'Perfil', $data);
}



function carregarConteudoPagina($page, $tipo = null)
{
    $conteudo = '';
    switch ($page) {
        case 'agenda':
            $conteudo = carregarAgenda();
            break;
        case 'avaliacao':
            // Exibir avaliações físicas
            break;
        default:
            $conteudo = "<p>Bem-vindo à sua página de perfil!</p>";
            break;
    }
    return $conteudo;
}



function carregarAgenda(){
    // preparar dados com o controller de agenda (reuso)
    $userId = $_SESSION['user_id'] ?? null;

    $modalidadeSelecionada = $_GET['modalidade'] ?? 'todas';
    $data = prepareAgendaData($userId, $modalidadeSelecionada);

    // renderizar partial da agenda e retornar como string
    extract($data);
    ob_start();
    include __DIR__ . '/../view/agendaView.php';
    return ob_get_clean();
}

