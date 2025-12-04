<div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Minhas Avaliações</h2>

    <?php if (empty($avaliacoes)): ?>
        <p>Você ainda não enviou nenhuma avaliação.</p>
    <?php else: ?>
        <ul class="space-y-3 mb-6">
            <?php foreach ($avaliacoes as $av): ?>
                <li class="border border-gray-200 rounded p-3">
                    <div class="flex justify-between">
                        <strong><?php echo htmlspecialchars($av['nome_instrutor'] ?? 'Instrutor'); ?></strong>
                        <span>Nota: <?php echo number_format($av['nota'], 1, ',', '.'); ?></span>
                    </div>
                    <p class="mt-2"><?php echo htmlspecialchars($av['comentarios']); ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <h3 class="text-xl font-semibold mb-2">Nova Avaliação</h3>

    <form method="POST" action="/profile?page=avaliacao" class="space-y-3">
        <input type="hidden" name="action" value="nova_avaliacao">

        <div>
            <label for="id_funcionario" class="block mb-1">Instrutor</label>
            <select id="id_funcionario" name="id_funcionario" class="border rounded px-2 py-1" required>
                <option value="">Selecione...</option>
                <?php foreach ($instrutores as $inst): ?>
                    <option value="<?php echo (int)$inst['id_funcionario']; ?>">
                        <?php echo htmlspecialchars($inst['nome']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <label for="nota" class="block mb-1">Nota (0 a 10)</label>
            <input type="number" step="0.1" min="0" max="10" id="nota" name="nota"
                   class="border rounded px-2 py-1" required>
        </div>

        <div>
            <label for="comentarios" class="block mb-1">Comentário</label>
            <textarea id="comentarios" name="comentarios" rows="3"
                      class="w-full border rounded px-2 py-1" required></textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
            Enviar Avaliação
        </button>
    </form>
</div>