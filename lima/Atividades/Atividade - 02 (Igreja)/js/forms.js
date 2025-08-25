// Email validation function
function checkEmail() {
    const emailInput = document.getElementById('email');
    const emailError = document.getElementById('emailError');
    const email = emailInput.value;

    if (email === '' || /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        emailError.classList.add('hidden');
    } else {
        emailError.classList.remove('hidden');
    }
}

// Form submission handling
document.getElementById('suggestionForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent default form submission

    const emailInput = document.getElementById('email');
    const emailError = document.getElementById('emailError');
    const feedback = document.getElementById('feedback');
    const submitBtn = document.getElementById('submitBtn');

    // Validate email if provided
    if (emailInput.value && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value)) {
        emailError.classList.remove('hidden');
        return;
    }

    // Simulate form submission (e.g., to a server)
    // Replace this with actual API call if needed
    console.log({
        nome: document.getElementById('nome').value,
        email: emailInput.value,
        categoria: document.getElementById('categoria').value,
        mensagem: document.getElementById('mensagem').value,
        privacidade: document.getElementById('privacidade').checked
    });

    // Mostrar mensagem de feedback e resetar o formulário
    feedback.classList.remove('hidden');
    submitBtn.disabled = true; //Desativar o botão para evitar múltiplos envios
    document.getElementById('suggestionForm').classList.add('hidden');
    setTimeout(() => {
        
        document.getElementById('suggestionForm').reset();
        feedback.classList.add('hidden');
        document.getElementById('suggestionForm').classList.remove('hidden');
        submitBtn.disabled = false;
        window.location.href = "./index.html"; // Redirecionar para a página inicial
    }, 3000);
});