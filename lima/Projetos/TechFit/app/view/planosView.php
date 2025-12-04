<body class="bg-light">

<header>
    <?php require (__DIR__ . "/partials/nav.php"); ?>
</header>

<section class="container py-5">
    <h1 class="text-center mb-5">Nossos Planos</h1>
    <p class="text-center mb-5 text-muted">
        Escolha o plano que melhor se adapta às suas necessidades.
    </p>

    <div class="row">
        <!-- Plano Básico -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm h-100 d-flex flex-column p-4">
                <h4 class="card-title">Plano Básico</h4>
                <h5 class="card-subtitle mb-2 text-muted">Para iniciantes</h5>
                <div class="card-body text-center">
                    <h2>R$99,99</h2>
                    <span>/mês</span>
                </div>
                <ul class="py-3">
                    <li>Acesso a modalidades básicas</li>
                    <li>Treino funcional</li>
                    <li>Controle de frequência</li>
                </ul>
                <button class="btn btn-outline-dark fw-bold mt-auto">Assinar</button>
            </div>
        </div>

        <!-- Plano Intermediário -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm h-100 d-flex flex-column p-4 border-primary border-2">
                <h4 class="card-title">Plano Intermediário</h4>
                <h5 class="card-subtitle mb-2 text-muted">Para quem quer mais</h5>
                <div class="card-body text-center">
                    <h2>R$149,99</h2>
                    <span>/mês</span>
                </div>
                <ul class="py-3">
                    <li>Acesso a todas as modalidades</li>
                    <li>Treino funcional + aulas coletivas</li>
                    <li>Benefícios adicionais</li>
                </ul>
                <button class="btn btn-primary fw-bold mt-auto">Assinar</button>
            </div>
        </div>

        <!-- Plano Premium -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm h-100 d-flex flex-column p-4">
                <h4 class="card-title">Plano Premium</h4>
                <h5 class="card-subtitle mb-2 text-muted">Para atletas e profissionais</h5>
                <div class="card-body text-center">
                    <h2>R$199,99</h2>
                    <span>/mês</span>
                </div>
                <ul class="py-3">
                    <li>Acesso ilimitado a todas as modalidades</li>
                    <li>Treino personalizado</li>
                    <li>Consultoria e suporte especializado</li>
                </ul>
                <button class="btn btn-outline-dark fw-bold mt-auto">Assinar</button>
            </div>
        </div>
    </div>
</section>

<section class="max-w-4xl mx-auto py-12 px-4">
    <h2 class="text-3xl font-bold text-center mb-8">💡 Perguntas sobre os Planos</h2>

    <div class="space-y-4">
        <div class="border rounded-lg overflow-hidden">
            <button class="w-full text-left px-6 py-4 bg-gray-100 hover:bg-gray-200 flex justify-between items-center faq-btn">
                <span>Quais planos estão disponíveis?</span>
                <span class="transform transition-transform duration-300">&#x25BC;</span>
            </button>
            <div class="px-6 py-4 hidden faq-content">
                Temos três planos principais: Básico, Intermediário e Premium. Cada um oferece benefícios diferentes, do acesso a modalidades básicas até treinos personalizados e consultoria especializada.
            </div>
        </div>

        <div class="border rounded-lg overflow-hidden">
            <button class="w-full text-left px-6 py-4 bg-gray-100 hover:bg-gray-200 flex justify-between items-center faq-btn">
                <span>Posso mudar de plano depois de assinar?</span>
                <span class="transform transition-transform duration-300">&#x25BC;</span>
            </button>
            <div class="px-6 py-4 hidden faq-content">
                Sim! Você pode trocar de plano a qualquer momento acessando sua página de perfil na seção “Planos”. A mudança será aplicada no próximo ciclo de pagamento.
            </div>
        </div>

        <div class="border rounded-lg overflow-hidden">
            <button class="w-full text-left px-6 py-4 bg-gray-100 hover:bg-gray-200 flex justify-between items-center faq-btn">
                <span>Como funciona o pagamento dos planos?</span>
                <span class="transform transition-transform duration-300">&#x25BC;</span>
            </button>
            <div class="px-6 py-4 hidden faq-content">
                Aceitamos cartão de crédito, débito e PIX. O pagamento é mensal e automático, garantindo que você não perca nenhum acesso às aulas ou benefícios do plano.
            </div>
        </div>

        <div class="border rounded-lg overflow-hidden">
            <button class="w-full text-left px-6 py-4 bg-gray-100 hover:bg-gray-200 flex justify-between items-center faq-btn">
                <span>Há algum período de teste grátis?</span>
                <span class="transform transition-transform duration-300">&#x25BC;</span>
            </button>
            <div class="px-6 py-4 hidden faq-content">
                Sim, oferecemos um período de teste de 7 dias para novos usuários em qualquer plano. Você pode experimentar todas as funcionalidades antes de confirmar a assinatura.
            </div>
        </div>

        <div class="border rounded-lg overflow-hidden">
            <button class="w-full text-left px-6 py-4 bg-gray-100 hover:bg-gray-200 flex justify-between items-center faq-btn">
                <span>O que acontece se eu cancelar meu plano?</span>
                <span class="transform transition-transform duration-300">&#x25BC;</span>
            </button>
            <div class="px-6 py-4 hidden faq-content">
                Se você cancelar, continuará tendo acesso até o final do período já pago. Após isso, o acesso às aulas e benefícios será desativado.
            </div>
        </div>
    </div>
</section>

<script>
    const faqButtons = document.querySelectorAll('.faq-btn');

    faqButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const content = btn.nextElementSibling;
            const arrow = btn.querySelector('span:last-child');
            content.classList.toggle('hidden');
            arrow.classList.toggle('rotate-180');
        });
    });
</script>

