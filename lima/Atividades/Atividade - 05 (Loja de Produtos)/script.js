// Seleciona o botão de alternância e o elemento body
const darkModeToggle = document.getElementById("dark-mode-toggle");
const body = document.body;

// Verifica se o tema foi salvo no localStorage
const currentTheme = localStorage.getItem("theme");

// Se o tema já foi definido anteriormente, aplica
if (currentTheme) {
    body.setAttribute("data-theme", currentTheme);
}

// Adiciona um evento de clique ao botão de alternância
darkModeToggle.addEventListener("click", () => {
    let theme = body.getAttribute("data-theme");

    // Alterna entre os temas
    if (theme === "dark") {
        body.setAttribute("data-theme", "light");
        localStorage.setItem("theme", "light"); // Salva a preferência
    } else {
        body.setAttribute("data-theme", "dark");
        localStorage.setItem("theme", "dark"); // Salva a preferência
    }
});
