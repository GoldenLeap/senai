


<?php



/**
 * Prepara os dados usados pela view de agenda e retorna um array com eles.
 * Não executa render diretamente para permitir que o caller inclua o conteúdo
 * dentro de outra view (ex.: profileView).
 *
 * @param int|null $userId
 * @param string $modalidadeSelecionada
 * @return array
 */
function prepareAgendaData($userId = null, $modalidadeSelecionada = 'todas'){
    $db = Connect::conectar();
    $modalidades = Modalidades::getModalidades($db);

    $id_modalidade = ($modalidadeSelecionada !== 'todas') ? (int)$modalidadeSelecionada : null;

    // obter aulas
    $aulas = Aulas::getAulas($id_modalidade);

    // coletar ids e buscar stats em lote
    $aulaIds = array_column($aulas, 'id_aula');
    $stats = Aulas::getStatsForAulas($aulaIds, $userId);

    foreach ($aulas as &$a) {
        $id = $a['id_aula'];
        $a['inscritos'] = $stats[$id]['inscritos'] ?? 0;
        $a['agendado']  = $stats[$id]['agendado'] ?? false;
    }
    unset($a);

    $modalidadeNome = 'Todas';
    if ($id_modalidade !== null) {
        foreach ($modalidades as $m) {
            if ((int)$m['id_modalidade'] === $id_modalidade) {
                $modalidadeNome = $m['nome_modalidade'];
                break;
            }
        }
    }

    return [
        'modalidades' => $modalidades,
        'modalidadeSelecionada' => $modalidadeSelecionada,
        'aulas' => $aulas,
        'modalidadeNome' => $modalidadeNome
    ];
}

function agendaController(){
    $userId = $_SESSION['user_id'] ?? null;
    $modalidadeSelecionada = $_GET['modalidade'] ?? 'todas';
    $data = prepareAgendaData($userId, $modalidadeSelecionada);
    render('agendaView', 'Minha Agenda', $data);
}
