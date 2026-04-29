// ===============================
// ✨ Parpadeo suave del logo
// ===============================
const logoText = document.querySelector('.logo-text');

if (logoText) {
    setInterval(() => {
        logoText.classList.toggle('glow');
    }, 1500);
}

// ===============================
// 🌌 Generador de estrellas
// ===============================
const starfield = document.getElementById("starfield");

if (starfield) {
    const NUM_STARS = 150;

    for (let i = 0; i < NUM_STARS; i++) {
        const star = document.createElement("div");
        star.classList.add("stars");

        // Posición aleatoria
        star.style.left = `${Math.random() * window.innerWidth}px`;
        star.style.top = `${Math.random() * window.innerHeight}px`;

        // Duración aleatoria del parpadeo
        star.style.animationDuration = `${5 + Math.random() * 10}s`;

        starfield.appendChild(star);
    }
}
