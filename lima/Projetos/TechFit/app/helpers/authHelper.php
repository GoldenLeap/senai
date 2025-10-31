<?php function logout(){
    session_destroy();
    header('Location: /');
}

function verificarUsuario()
{
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login.php');
        exit;
    }

    $db = Connect::conectar();
    $stmt = $db->prepare("SELECT id_usuario email, tipo, avatar FROM Usuarios WHERE id_usuario = :id_usuario");
    $stmt->bindParam(":id_usuario", $_SESSION['user_id']);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$usuario){
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
    if($stmt){
        $stmt->bindParam(':id_usuario', $_SESSION['user_id']);
        $stmt->execute();
        $dadosUsuario = $stmt->fetch(PDO::FETCH_ASSOC);
        $userNome = $dadosUsuario['nome'] ?? $userNome;
    }
    return[
        'user_name' => $userNome,
        'user_tipo' => ucfirst($userTipo),
        'user_avatar' => $usuario['avatar'] ?? __DIR__ . 'images/upload/avatar.png '
    ];
}