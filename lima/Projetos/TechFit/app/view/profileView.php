<div class="min-h-screen flex">
    <aside class="w-64 flex-shrink-0 bg-[#efefef]">
        <div class="sticky top-0 p-4 flex flex-col h-screen">
            <div class="flex-grow">
                <img src="<?= $user_pfp ?>" alt="Foto de Perfil" class="size-40 ring-2 ring-white rounded-full mb-2">
                <p class="font-bold text-black-900"><?= $user_name ?></p>
                <p class="text-gray-600"><?= $user_tipo ?></p>
                
                <nav class="mt-6 flex flex-col space-y-3">
                    <?php if (strtolower($user_tipo) == 'aluno'): ?>
                        <a href="/profile.php?page=agenda" class="hover:bg-[#cfcfcf] rounded px-2 py-1 transition-colors">📅 Minha Agenda</a>
                        <a href="/profile.php?page=avaliacao" class="hover:bg-[#cfcfcf] rounded px-2 py-1 transition-colors">📊 Avaliação Física</a>
                        <a href="/profile.php?page=frequencia" class="hover:bg-[#cfcfcf] rounded px-2 py-1 transition-colors">📈 Frequência</a>
                        <a href="/comunicados" class="hover:bg-[#cfcfcf] rounded px-2 py-1 transition-colors">📢 Comunicados</a>
                    <?php elseif (strtolower($user_tipo) == 'funcionario'): ?>
                        <a href="/admin/painel" class="hover:bg-[#cfcfcf] rounded px-2 py-1 transition-colors">📋 Painel Administrativo</a>
                        <a href="/admin/relatorios" class="hover:bg-[#cfcfcf] rounded px-2 py-1 transition-colors">📑 Relatórios</a>
                    <?php endif; ?>
                    <a href="/" class="hover:bg-[#cfcfcf] rounded px-2 py-1 transition-colors">🏠Voltar ao inicio</a>
                </nav>
            </div>

            <div class="border-t border-dotted border-[#2f2f2f] mt-4 pt-2 space-y-2">
                <a href="/configuracoes" class="hover:bg-[#cfcfcf] rounded px-2 py-1 flex items-center space-x-2 transition-colors">
                    <span>⚙️</span><span>Configurações</span>
                </a>
                <a href="/logout.php" class="hover:bg-[#cfcfcf] rounded px-2 py-1 flex items-center space-x-2 text-red-600 transition-colors">
                    <span>🚪</span><span>Sair</span>
                </a>
            </div>
        </div>
    </aside>

    <main class="flex-1 min-h-screen">
        <div class="p-6">
            <?= $pageContent ?? ''?>
        </div>
    </main>
</div>