<?php

function comunicadoPublicController()
{
    $erros   = [];
    $sucesso = null;

    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $avisoSelecionado = null;

    // Se for POST, tratar ações de admin
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Só funcionário pode editar/excluir
        if (($_SESSION['user_tipo'] ?? null) !== 'funcionario') {
            http_response_code(403);
            echo "Acesso negado.";
            exit;
        }

        $acao = $_POST['acao'] ?? '';

        if ($acao === 'delete') {
            $id_alerta = (int)($_POST['id_alerta'] ?? 0);

            if ($id_alerta <= 0) {
                $erros[] = 'ID inválido para exclusão.';
            } else {
                if (Aviso::deleteAviso($id_alerta)) {
                    // Redireciona para o feed sem id
                    header('Location: /comunicados');
                    exit;
                } else {
                    $erros[] = 'Erro ao excluir o comunicado.';
                }
            }

        } elseif ($acao === 'edit') {
            $id_alerta = (int)($_POST['id_alerta'] ?? 0);
            $titulo    = trim($_POST['titulo']   ?? '');
            $tipo      = trim($_POST['tipo']     ?? '');
            $conteudo  = trim($_POST['conteudo'] ?? '');
            $expira    = trim($_POST['expira']   ?? '');

            if ($id_alerta <= 0) {
                $erros[] = 'ID inválido para edição.';
            }
            if ($titulo === '') {
                $erros[] = 'O título é obrigatório.';
            }
            if ($conteudo === '') {
                $erros[] = 'O conteúdo é obrigatório.';
            }

            $tiposValidos = Aviso::getTipos();
            if (!in_array($tipo, $tiposValidos, true)) {
                $erros[] = 'Tipo de aviso inválido.';
            }

            if ($expira === '') {
                $erros[] = 'A data de expiração é obrigatória.';
            }

            if (empty($erros)) {
                if (Aviso::updateAviso($id_alerta, $titulo, $tipo, $conteudo, $expira)) {
                    $sucesso = 'Comunicado atualizado com sucesso.';
                   
                    $id = $id_alerta;
                } else {
                    $erros[] = 'Erro ao atualizar o comunicado.';
                }
            }

            if ($id_alerta > 0) {
                $avisoSelecionado = Aviso::getById($id_alerta);
            }
        }
    }

    if ($avisoSelecionado === null && $id > 0) {
        $avisoSelecionado = Aviso::getById($id);
    }

    $avisos = Aviso::getAllForAdmin(); 

    $tipoLabels = getTipoLabelsAvisos();

    $data = [
        'avisos'           => $avisos,
        'avisoSelecionado' => $avisoSelecionado,
        'nomeTipo'         => $tipoLabels,
        'erros'            => $erros,
        'sucesso'          => $sucesso,
        'isFuncionario'    => ($_SESSION['user_tipo'] ?? null) === 'funcionario',
    ];

    render("comunicados/feedView", "Comunicados", $data);
}
