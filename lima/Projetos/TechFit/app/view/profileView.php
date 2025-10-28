<div class="flex">
    <aside class="flex flex-col justify-between h-screen bg-[#efefef] w-xs p-4">
        <div>
            <img src="<?= $user_pfp ?>" alt="Foto de Perfil" class="size-40 ring-2 ring-white rounded-full mb-2">
            <p class="font-bold text-black-900"><?= $nome ?></p>
            <p class="text-gray-600"><?= $tipo ?></p>
            <div class="mt-6 flex flex-col space-y-3">
                <?php if (strtolower($tipo) == 'aluno'): ?>
                    <a href="/profile.php?page=agenda" class="hover:bg-[#cfcfcf] rounded px-2 py-1">📅 Minha Agenda</a>
                    <a href="/profile.php?page=avaliacao" class="hover:bg-[#cfcfcf] rounded px-2 py-1">📊 Avaliação Física</a>
                    <a href="/profile.php?page=frequencia" class="hover:bg-[#cfcfcf] rounded px-2 py-1">📈 Frequência</a>
                    <a href="/comunicados" class="hover:bg-[#cfcfcf] rounded px-2 py-1">📢 Comunicados</a>
                <?php elseif (strtolower($tipo) == 'funcionario'): ?>
                    <a href="/admin/painel" class="hover:bg-[#cfcfcf] rounded px-2 py-1">📋 Painel Administrativo</a>
                    <a href="/admin/relatorios" class="hover:bg-[#cfcfcf] rounded px-2 py-1">📑 Relatórios</a>
                <?php endif; ?>
            </div>
        </div>

        <div class="border-t border-dotted border-[#2f2f2f] mt-4 pt-2 space-y-2">
            <a href="/configuracoes" class="hover:bg-[#cfcfcf] flex items-center space-x-2"><span>⚙️</span><span>Configurações</span></a>
            <a href="/logout" class="hover:bg-[#cfcfcf] flex items-center space-x-2 text-red-600"><span>🚪</span><span>Sair</span></a>
        </div>
    </aside>
    <div class="flex-1 p-6 overflow-auto">
        <?= $page ?? ''?>
    </div>
</div>