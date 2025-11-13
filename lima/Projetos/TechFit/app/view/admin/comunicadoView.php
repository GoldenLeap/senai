<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md border">
    <h2 class="text-xl font-semibold mb-6 text-gray-700">Criar Novo Comunicado</h2>
    <form action="" method="post" class="flex flex-col space-y-4">
        <div>
            <label for="titulo" class="block text-gray-700 font-medium mb-2">
                Título
            </label>
            <input
                type="text"
                name="titulo"
                id="titulo"
                class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                placeholder="Digite o título do comunicado..."
                required
            >
        </div>
        <div>
            <label class="block text-gray-700 font-medium mb-2" for="tipo">Tipo de Aviso</label>
            <select name="tipo" id="">

                <?php foreach ($avisoTipos as $tipo): ?>
                    <option value="<?php echo $tipo ?>"><?php echo $nomeTipo[$tipo] ?></option>
                <?php endforeach; ?>

            </select>
        </div>
        <div>
            <label for="conteudo" class="block text-gray-700 font-medium mb-2">
                Conteúdo
            </label>
            <textarea
                name="conteudo"
                id="conteudo"
                rows="8"
                class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                placeholder="Escreva o conteúdo do comunicado aqui..."
                required
            ></textarea>
        </div>

        <button
            type="submit"
            class="bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition-all">
            Enviar Comunicado
        </button>
    </form>
</div>
