<?php
function profileController()
{

    if (! isset($_SESSION["user_id"])) {

        /*header('Location: /login.php');
        exit();*/
    }
    $usuario  = verificarUsuario();
    $currPage = $_GET['page'] ?? '';

    $data = [
        'user_pfp'   => $usuario['user_avatar'],
        'user_name'  => $usuario['user_name'],
        'user_tipo'  => $usuario['user_tipo'],
        'headExtras' => <<<HTML
    <link rel="stylesheet" href="./assets/css/profile.css" />
    <link rel="stylesheet" href="./assets/css/utility.css"/>
HTML
    ];
    $data['page'] = carregarConteudoPagina($currPage);
    render('profileView', 'Perfil', $data);
}

function verificarUsuario()
{
    if (! isset($_SESSION['user_id'])) {
        header('Location: /login.php');
        exit;
    }

    $db   = Connect::conectar();
    $stmt = $db->prepare("SELECT id_usuario email, tipo, avatar FROM Usuarios WHERE id_usuario = :id_usuario");
    $stmt->bindParam(":id_usuario", $_SESSION['user_id']);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    if (! $usuario) {
        header('location: /');
        exit;
    }
    $userTipo = $usuario['tipo'];
    $userNome = 'User';

    switch ($userTipo) {
        case 'aluno':
            $stmt = $db->prepare("SELECT nome_aluno AS nome FROM Alunos WHERE id_usuario = :id_usuario");
            break;
        case 'funcionario':
            $stmt = $db->prepare('SELECT nome_funcionario  AS nome FROM Funcionarios WHERE id_usuario = :id_usuario');
            break;
        default:
            $stmt = null;
            break;
    }
    if ($stmt) {
        $stmt->bindParam(':id_usuario', $_SESSION['user_id']);
        $stmt->execute();
        $dadosUsuario = $stmt->fetch(PDO::FETCH_ASSOC);
        $userNome     = $dadosUsuario['nome'] ?? $userNome;
    }
    return [
        'user_name'   => $userNome,
        'user_tipo'   => ucfirst($userTipo),
        'user_avatar' => $usuario['avatar'] ?? __DIR__ . '/images/upload/pfp/avatar.png ',
    ];
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
        case 'configuracao':
            $conteudo = carregarConfig();
        default:
            $conteudo = "<p>Bem-vindo à sua página de perfil!</p>";
            break;
    }
    return $conteudo;
}

function carregarAgenda()
{
    $db = Connect::conectar();

    $modalidadeSelecionada = $_GET['modalidade'] ?? 'todas';
    $modalidadesAluno      = Modalidades::getModalidadesByAluno($_SESSION['user_id']);

    $aulasAluno = Aulas::getAulasByAluno($_SESSION['user_id'], $modalidadeSelecionada);
    ob_start();
    include __DIR__ . '/../view/agendaView.php';
    return ob_get_clean();
}
