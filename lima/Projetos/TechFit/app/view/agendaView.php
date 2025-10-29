<div class="max-w-3xl mx-auto p-6">
    <h2 class="text-2xl font-bold mb-6">📅 Minha Agenda</h2>

    <!-- Filtro de Modalidades -->
    <div class="mb-4">
        <label for="modalidade" class="font-semibold text-gray-700">Escolha a Modalidade:</label>
        <select id="modalidade" class="block w-full mt-2 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="updateModalidade(this)">
            <option value="todas" <?= $modalidadeSelecionada == 'todas' ? 'selected' : '' ?>>Todas</option>
            <?php foreach ($modalidades as $modalidade): ?>
                <option value="<?= $modalidade['id_modalidade'] ?>" <?= $modalidadeSelecionada == $modalidade['id_modalidade'] ? 'selected' : '' ?>>
                    <?= $modalidade['nome_modalidade'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <!-- Calendário de Aulas -->
    <div>
        <h3 class="font-semibold text-lg mb-4">Agendar Aulas</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <?php foreach ($aulas as $aula): ?>
                <div class="bg-gray-100 p-4 rounded-lg shadow-sm">
                    <p class="font-medium text-xl mb-2"><?= date('l, d/m/Y', strtotime($aula['dia_aula'])) ?></p>
                    <div class="mb-2">
                        <span class="block text-gray-600"><?= date('H:i', strtotime($aula['horario_inicio'])) ?> - <?= date('H:i', strtotime($aula['horario_fim'])) ?></span>
                        
                        <?php
                        // Verificar se o aluno já está agendado
                        $agendado = false; // Aqui você faria uma consulta para ver se o aluno já tem um agendamento
                        $capacidade = $aula['quantidade_pessoas']; // Obter a capacidade
                        $inscritos = 5; // Aqui você faria uma consulta para contar o número de inscritos na aula
                        
                        // Substitua as variáveis acima com os dados reais do banco
                        ?>

                        <?php if ($agendado): ?>
                            <button class="mt-2 w-full bg-gray-500 text-white py-2 rounded-md" disabled>Já Agendado</button>
                        <?php elseif ($inscritos < $capacidade): ?>
                            <button class="mt-2 w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 focus:outline-none">Agendar</button>
                        <?php else: ?>
                            <button class="mt-2 w-full bg-yellow-500 text-white py-2 rounded-md hover:bg-yellow-600 focus:outline-none">Adicionar à Lista de Espera</button>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="mt-6 bg-gray-50 p-4 rounded-lg shadow-sm">
        <h3 class="font-semibold text-lg mb-2">Lista de Espera</h3>
        <p class="text-gray-700">Não encontrou vaga? Adicione-se à lista de espera e receba uma notificação se uma vaga for liberada.</p>
        <button class="mt-4 w-full bg-yellow-500 text-white py-2 rounded-md hover:bg-yellow-600 focus:outline-none">Adicionar à Lista de Espera</button>
    </div>
</div>

<script>
    // Função que atualiza o parâmetro modalidade na URL
    function updateModalidade(selectElement) {
        const modalidade = selectElement.value;
        const urlParams = new URLSearchParams(window.location.search);

        // Verifica se o parâmetro 'page' existe, e preserva ele
        const page = urlParams.get('page') || '';

        // Atualiza ou adiciona o parâmetro modalidade
        urlParams.set('modalidade', modalidade);

        // Se já houver 'page', não alterar
        if (page) {
            urlParams.set('page', page);
        }

        // Redireciona para a nova URL com o parâmetro modalidade
        window.location.search = urlParams.toString();
    }
</script>
