<div class="max-w-3xl mx-auto p-6">
    <h2 class="text-2xl font-bold mb-6">📅 Minha Agenda</h2>

    <!-- Filtro de Modalidades -->
    <div class="mb-4">
        <label for="modalidade" class="font-semibold text-gray-700">Escolha a Modalidade:</label>
        <select id="modalidade" class="block w-full mt-2 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="updateModalidade(this)">
            <option value="todas" <?= $modalidadeSelecionada == 'todas' ? 'selected' : '' ?>>Todas</option>
            <?php foreach ($modalidadesAluno as $modalidade): ?>
                <option value="<?= $modalidade['id_modalidade'] ?>" <?= $modalidadeSelecionada == $modalidade['id_modalidade'] ? 'selected' : '' ?>>
                    <?= $modalidade['nome_modalidade'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div>
        <h3>Aulas Agendadas</h3>
        <?php foreach ($modalidadesAluno as $modalidade): ?>
            <p><?=$modalidade['nome_modalidade'];?></p>
            <hr> 
            <?php foreach($aulasAluno as $aula):?>
                
                <div class="col-span-8">
                    <?=var_dump($aula)?>
                    <div class="flex flex-col ">

                    </div>
                </div>
            <?php endforeach;?>
            
            <?php endforeach;?>
        </div>