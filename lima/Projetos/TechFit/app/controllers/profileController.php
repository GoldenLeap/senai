<?php
function profileController()
{
    
    if (!isset($_SESSION["user_id"])) {

        /*header('Location: /login.php');
        exit();*/
    }
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
    $data['page'] = carregarConteudoPagina($currPage);
    render('profileView', 'Perfil', $data);
}

function verificarUsuario()
{
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login.php');
        exit;
    }

    $db = Connect::conectar();
    //$stmt = $db->prepare("SELECT tipo, pfp FROM usuario WHERE id_usuario = :id_usuario");
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
        'user_avatar' => $usuario['avatar'] ?? __DIR__ . '/../../public/assets/images/avatar.png '
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
        default:
            $conteudo = "<p>Bem-vindo à sua página de perfil!</p>";
            break;
    }
    return $conteudo;
}



function carregarAgenda(){
    $db = Connect::conectar();

    // Verifica se existe o parâmetro 'modalidade' na URL e define a modalidade selecionada
    $modalidadeSelecionada = isset($_GET['modalidade']) ? $_GET['modalidade'] : 'todas';

    // Consulta para obter todas as modalidades
    $sqlModalidades = "SELECT * FROM Modalidades";
    $stmtModalidades = $db->prepare($sqlModalidades);
    $stmtModalidades->execute();
    $modalidades = $stmtModalidades->fetchAll(PDO::FETCH_ASSOC);

    // Consulta para obter as aulas, com filtro por modalidade se selecionada
    $sqlAulas = "
        SELECT 
            A.id_aula, A.dia_aula, A.quantidade_pessoas, M.nome_modalidade, F.nome_filial
        FROM 
            Aulas A
        JOIN 
            Modalidades M ON A.id_modalidade = M.id_modalidade
        JOIN 
            Filiais F ON A.id_filial = F.id_filial
        JOIN 
            Agendamento Ag ON A.id_aula = Ag.id_aula
        WHERE 
            Ag.id_aluno = :id_aluno AND Ag.status = 'agendado'";

    if ($modalidadeSelecionada !== 'todas') {
        $sqlAulas .= " AND A.id_modalidade = :id_modalidade";
    }

    $sqlAulas .= " ORDER BY A.dia_aula";

    $stmtAulas = $db->prepare($sqlAulas);
    $stmtAulas->bindParam(':id_aluno', $_SESSION['user_id']);
    if ($modalidadeSelecionada !== 'todas') {
        $stmtAulas->bindParam(':id_modalidade', $modalidadeSelecionada);
    }
    $stmtAulas->execute();
    $aulas = $stmtAulas->fetchAll(PDO::FETCH_ASSOC);

    // Passando os dados para a view
    ob_start();
    include __DIR__ . '/../view/agendaView.php'; // Incluindo a view que usará essas variáveis
    return ob_get_clean();
}

