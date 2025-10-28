<?php
function profileController(){

    if(!isset($_SESSION["user_id"])){
        
        /*header('Location: /login.php');
        exit();*/
    }
    $usuario = verificarUsuario();
    $currPage = $_GET['page'];

    $data = [
        'user_pfp' => "https://static.vecteezy.com/system/resources/previews/036/594/092/non_2x/man-empty-avatar-photo-placeholder-for-social-networks-resumes-forums-and-dating-sites-male-and-female-no-photo-images-for-unfilled-user-profile-free-vector.jpg",
        'nome' => $usuario['nome'],
        'tipo' => $usuario['tipo'],
        'headExtras' => <<<HTML
    <link rel="stylesheet" href="./assets/css/profile.css" />
    <link rel="stylesheet" href="./assets/css/utility.css"/>
HTML
    ];
    $data['page'] = carregarConteudoPagina($currPage);
    render('profileView', 'Perfil', $data);
}

function verificarUsuario(){
    if(!isset($_SESSION['user_id'])){
        header('Location: /login.php');
        exit;
    }
    return [
        // debug
        'nome' => $_SESSION['nome'] ?? 'Cleitin',
        'tipo' => $_SESSION['tipo']?? 'Aluno'
    ];
}

function carregarConteudoPagina($page, $tipo=null){
    $conteudo = '';
    switch ($page){
        case 'agenda':
            $conteudo = carregarAgenda();
            break;
        case 'avaliacao':
            // Exibir availiações fisicas
            break;
        case '...':
            break;
        default:
            break;
    }
    return $conteudo;
}


function carregarAgenda(){
    ob_start();
    include __DIR__ . '/../view/agenda.php';
    return ob_get_clean();
}