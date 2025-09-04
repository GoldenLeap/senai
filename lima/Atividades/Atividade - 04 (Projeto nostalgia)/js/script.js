const imgs = {
    "cdz" : document.getElementsByClassName("img-cdz"),
    "pc" : document.getElementsByClassName("img-pc"),
    "db" : document.getElementsByClassName("img-db"),
    "sm" : document.getElementsByClassName("img-sm"),
    "jb" : document.getElementsByClassName("img-jb"),
    "pk" : document.getElementsByClassName("img-pk")
}

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
