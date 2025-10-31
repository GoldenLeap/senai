
<?php
// agrupar aulas por modalidade
function agruparAulasPorModalidade($aulas) {
    $grupos = [];
    foreach ($aulas as $aula) {
        $modalidade = $aula['nome_modalidade'];
        if (!isset($grupos[$modalidade])) {
            $grupos[$modalidade] = [];
        }
        $grupos[$modalidade][] = $aula;
    }
    return $grupos;
}

$aulasPorModalidade = agruparAulasPorModalidade($aulas);
?>
<div class="max-w-3xl mx-auto p-6">
        <h3 class="font-semibold text-lg mb-4">Agendar Aulas</h3>    
<h2 class="text-2xl font-bold mb-6">📅 Minha Agenda</h2>

    <!-- Filtro de Modalidades -->
    <div class="mb-4">
        <label for="modalidade" class="font-semibold text-gray-700">Escolha a Modalidade:</label>
        <select id="modalidade" class="block w-full mt-2 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="updateModalidade(this)">
            <option value="todas" <?= $modalidadeSelecionada == 'todas' ? 'selected' : '' ?>>Todas as Modalidades</option>
            <?php foreach ($modalidades as $modalidade): ?>
                <option value="<?= $modalidade['id_modalidade'] ?>" <?= $modalidadeSelecionada == $modalidade['id_modalidade'] ? 'selected' : '' ?>>
                    <?= $modalidade['nome_modalidade'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <!-- Calendário de Aulas -->
    <div>


        <?php foreach ($aulasPorModalidade as $nomeModalidade => $aulasModalidade): ?>
            <!-- Seção da Modalidade -->
            <div class="mb-8">
                <h4 class="text-xl font-semibold mb-4 pb-2 border-b border-gray-200">
                    <?= $nomeModalidade ?>
                </h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <?php foreach ($aulasModalidade as $aula): ?>
                        <div class="bg-gray-100 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                            <!-- Data e Horário -->
                            <div class="mb-3">
                                <p class="font-medium text-lg">
                                    <?= date('l', strtotime($aula['dia_aula'])) ?>
                                </p>
                                <p class="text-gray-600">
                                    <?= date('d/m/Y', strtotime($aula['dia_aula'])) ?>
                                </p>
                                <p class="text-gray-600">
                                    <?= date('H:i', strtotime('13:00')) ?> - <?= '16:00' ?>
                                </p>
                            </div>

                        
                            <div>
                                <?php
                                $capacidade = $aula['quantidade_pessoas'];
                                $inscritos = $aula['inscritos'] ?? 0;
                                $agendado = $aula['agendado'] ?? false;
                                $vagasRestantes = $capacidade - $inscritos;
                                ?>
                                
                                <div class="flex justify-between items-center mb-3">
                                    <span class="text-sm">Vagas:</span>
                                    <span class="font-medium <?= $vagasRestantes > 0 ? 'text-green-600' : 'text-red-600' ?>">
                                        <?= $inscritos.'/'.$capacidade ?>
                                    </span>
                                </div>

                                <?php if ($agendado): ?>
                                    <button class="w-full bg-gray-500 text-white py-2 px-4 rounded-md opacity-75 cursor-not-allowed" disabled>
                                        Já Agendado
                                    </button>
                                <?php elseif ($inscritos < $capacidade): ?>
                                    <button class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                                        Agendar
                                    </button>
                                <?php else: ?>
                                    <button class="w-full bg-yellow-500 text-white py-2 px-4 rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition-colors">
                                        Lista de Espera
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Lista de Espera Global -->
    <div class="mt-8 bg-gray-50 p-6 rounded-lg shadow-sm">
        <h3 class="font-semibold text-lg mb-3">Lista de Espera</h3>
        <p class="text-gray-600 mb-4">
            Não encontrou vaga na aula desejada? Adicione seu nome à lista de espera e 
            receba uma notificação assim que uma vaga for liberada.
        </p>
        <button class="w-full bg-yellow-500 text-white py-3 px-4 rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition-colors">
            Gerenciar Lista de Espera
        </button>
    </div>
</div>

<script>
    function updateModalidade(selectElement) {
        const modalidade = selectElement.value;
        const urlParams = new URLSearchParams(window.location.search);
        const page = urlParams.get('page') || '';
        
        urlParams.set('modalidade', modalidade);
        if (page) {
            urlParams.set('page', page);
        }
        
        window.location.search = urlParams.toString();
    }
</script>
