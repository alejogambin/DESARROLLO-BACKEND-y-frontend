// Script para el botón de "Scroll to Top"
document.addEventListener("click", function (event) {
        const navbarToggler = document.querySelector(".navbar-toggler");
        const navbarCollapse = document.querySelector(".navbar-collapse");

        // Verifica si el navbar está abierto y si el clic fue fuera del navbar
        if (navbarCollapse.classList.contains("show") && !navbarToggler.contains(event.target) && !navbarCollapse.contains(event.target)) {
            navbarToggler.click(); // Simula un clic en el botón para cerrar el navbar
        }
    });