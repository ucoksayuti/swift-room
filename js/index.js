document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.getElementById("navbar");

    window.addEventListener("scroll", function () {
        if (window.scrollY > 0) {
            navbar.classList.add("scroll");
        } else {
            navbar.classList.remove("scroll");
        }
    });
});

// switching login dan daftar
    const loginForm = document.getElementById("login-form");
    const registerForm = document.getElementById("register-form");
    const toggleFormLink = document.getElementById("register-link");


    const login = document.getElementById("login-form");
        const daftar = document.getElementById("register-form");
        function pindahKeLogin() {
            login.style.display = "block";
            daftar.style.display = "none"
        }

        function pindahKeDaftar() {
            daftar.style.display = "block";
            login.style.display = "none"
        }




