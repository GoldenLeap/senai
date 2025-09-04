const cards = document.querySelectorAll(".card");

cards.forEach(card => {
    const img = card.querySelector("img");
    const staticSrc = img.getAttribute("data-static");
    const gifSrc = img.getAttribute("data-gif");

    card.addEventListener("mouseenter", () => {
        img.src = gifSrc;
    });

    card.addEventListener("mouseleave", () => {
        img.src = staticSrc;
    });
});
