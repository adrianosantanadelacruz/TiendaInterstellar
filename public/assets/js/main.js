// Pequeño efecto: parpadeo suave del logo
const logoText = document.querySelector('.logo-text');
if (logoText) {
    setInterval(() => {
        logoText.classList.toggle('glow');
    }, 1500);
}
// Generador de estrellas
const starfield = document.getElementById("starfield");

for (let i = 0; i < 150; i++) {
    let star = document.createElement("div");
    star.classList.add("stars");
    star.style.left = Math.random() * window.innerWidth + "px";
    star.style.top = Math.random() * window.innerHeight + "px";
    star.style.animationDuration = (5 + Math.random() * 10) + "s";
    starfield.appendChild(star);
}
