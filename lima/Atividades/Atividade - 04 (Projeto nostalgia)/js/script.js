const cards = document.querySelectorAll(".card");
const modal = document.querySelector("#videoModal");
const modalIframe = modal.querySelector("iframe");
const closeBtn = modal.querySelector(".close-btn");

cards.forEach((card) => {
  const img = card.querySelector("img");
  const staticSrc = img?.getAttribute("data-static");
  const gifSrc = img?.getAttribute("data-gif");
  const videoSrc = card.getAttribute("data-video");

  // Efeito de hover para trocar imagem por gif
  if (staticSrc && gifSrc) {
    card.addEventListener("mouseenter", () => {
      img.src = gifSrc;
    });
    card.addEventListener("mouseleave", () => {
      img.src = staticSrc;
    });
  }

  // Abrir vídeo ao clicar
  if (videoSrc) {
    card.addEventListener("click", () => {
      modalIframe.src = videoSrc;
      modal.style.display = "flex";
    });
  }
});

// Fechar video ao clicar no botão
closeBtn.addEventListener("click", () => {
  modal.style.display = "none";
  modalIframe.src = ""; // Limpa o vídeo para pausar
});

// Fechar video ao clicar fora
modal.addEventListener("click", (e) => {
  if (e.target === modal) {
    modal.style.display = "none";
    modalIframe.src = "";
  }
});

// Fechar video com tecla Esc
document.addEventListener("keydown", (e) => {
  if (e.key === "Escape" && modal.style.display === "flex") {
    modal.style.display = "none";
    modalIframe.src = "";
  }
});
