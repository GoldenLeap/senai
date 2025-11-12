<?php require_once __DIR__ . "/../view/partials/nav.php"; ?>
<div class="flex flex-col justify-content-center align-center p-20 pt-0 mt-2">
    <h1 class="text-center text-lg">Aulas Disponiveis</h1>
    <label for="modalidade">
        Modalidade
    </label>
    <select id="modalidade">
        <option value="todas" <?php echo $modalidadeSelecionada == 'todas' ? 'selected' : ''?>>Todas</option>
        <?php foreach ($modalidades as $modalidade): ?>
            <option value="<?php echo $modalidade['id_modalidade']?>"><?php echo $modalidade["nome_modalidade"]?></option>
        <?php endforeach;?>
        </select>
    <div class="grid grid-cols-3 w-half pt-5 gap-4">
        <?php foreach ($aulas as $aula):?>

        <div class="border flex flex-col align-center gap-4 justify-center rounded-lg p-4 shadow-sm bg-white transition hover:shadow-md">

            <h1 class="text-center"><?php echo $aula["nome_aula"]?></h1>
            <p><?php echo $aula["descricao"]?></p>
            <p><strong>Vagas: </strong><?php echo Aulas::getInscritos($aula["id_aula"])?>/<?php echo $aula["quantidade_pessoas"]?></p>
            <p><strong>Data: </strong><?php echo date('d/m/Y', strtotime($aula["dia_aula"]))?></p>
            <form action="agendar" method="post">
                <input type="text" hidden name="" value="<?php echo $aula['id_aula'] ?>" id="">
                <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">Agendar Aula</button>
           </form>
        </div>
    <?php endforeach;?>
    </div>
</div>
