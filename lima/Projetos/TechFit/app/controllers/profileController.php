<?php

require_once __DIR__ . '/agendaController.php';
require_once __DIR__ . '/configController.php';

function profileController(): void
{
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login.php');
        exit;
    }

    $usuario = Usuario::getUsuarioCompleto($_SESSION['user_id']);
    if (!$usuario) {
        flash("Usuário não encontrado", "error");
        session_destroy();
        header('Location: /');
        exit;
    }

    $currPage = $_GET['page'] ?? '';
    $action   = $_POST['action'] ?? '';

    // Dados comuns para todas as páginas do perfil
    $data = [
        'user_pfp'   => $usuario['user_avatar'],
        'user_name'  => $usuario['user_name'],
        'user_tipo'  => ucfirst($usuario['user_tipo']),
        'headExtras' => <<<HTML
            <link rel="stylesheet" href="/assets/css/profile.css" />
            <link rel="stylesheet" href="/assets/css/utility.css"/>
        HTML,
        'currPage'   => $currPage,
    ];

    // ========================================
    // Tratamento das ACTIONS (POST)
    // ========================================
    if ($action) {
        switch ($action) {
            case 'cancelar':
                handleCancelarAgendamento();
                break;

            case 'update_profile':
                handleUpdateProfile($_SESSION['user_id'], $usuario['user_tipo']);
                break;

            case 'change_password':
                handleChangePassword($_SESSION['user_id']);
                break;

            case 'change_avatar':
                handleChangeAvatar($_SESSION['user_id']);
                break;
        }

        // Após qualquer ação POST, evita reprocessar ao recarregar
        if (!in_array($action, ['change_avatar', 'update_profile'])) {
            // Só redireciona se não for um dos que já redirecionam internamente
            header("Location: /profile?page=" . urlencode($currPage));
            exit;
        }
    }

    // ========================================
    // Carregamento da sub-view e dados específicos
    // ========================================
    switch ($currPage) {
        case 'agenda':
            $data['subView'] = 'agendaView.php';
            $data += loadAgendaData($_SESSION['user_id']);
            break;

        case 'avaliacao':
            $data['subView'] = 'partials/placeholderView.php';
            $data['message'] = 'Avaliação física em desenvolvimento.';
            break;

        case 'frequencia':
            $data['subView'] = 'partials/placeholderView.php';
            $data['message'] = 'Frequência em desenvolvimento.';
            break;

        case 'configuracao':
            $data['subView'] = 'configView.php';
            $data += loadConfigData($_SESSION['user_id'], $usuario['user_tipo']);
            break;

        default:
            $data['subView'] = 'partials/placeholderView.php';
            $data['message'] = 'Bem-vindo à sua página de perfil!';
            break;
    }

    render('profileView', 'Perfil', $data);
}


// Funções auxiliares 
function loadAgendaData(int $id_usuario): array
{
    $aluno = Aluno::getAlunoByUserID($id_usuario);
    $id_aluno = $aluno['id_aluno'] ?? null;
    $modalidadeSelecionada = $_GET['modalidade'] ?? 'todas';

    $modalidadesAluno = $id_aluno ? Modalidades::getModalidadesAgendadasByAluno($id_aluno) : [];
    $aulasAluno       = $id_aluno ? Aulas::getAulasByAluno($id_aluno, $modalidadeSelecionada) : [];

    return [
        'modalidadeSelecionada' => $modalidadeSelecionada,
        'modalidadesAluno'      => $modalidadesAluno,
        'aulasAluno'            => $aulasAluno,
    ];
}

// Handlers
function handleCancelarAgendamento(): void
{
    $ag_id = $_POST['agendamento_id'] ?? null;
    $aluno = Aluno::getAlunoByUserID($_SESSION['user_id']);

    if (!$ag_id || !$aluno) {
        flash("Dados inválidos para cancelamento", "error");
        return;
    }

    cancelarAgendamento((int)$ag_id, (int)$aluno['id_aluno']);
    flash("Agendamento cancelado com sucesso!", "success");
}