const hamburger = document.querySelector(".hamburger");
const navLinks = document.querySelector(".nav-links");
const links = document.querySelectorAll(".nav-links li");

hamburger.addEventListener("click", () => {
    navLinks.classList.toggle("open");
    links.forEach(link => {
        link.classList.toggle("fade");
    });
});

var pass = document.getElementById("password");
var con_pass = document.getElementById("confirm_password");

function validatePassword() {
    if (pass.value != con_pass.value) {
        con_pass.setCustomValidity("Passwords Don't Match");
    } else {
        confirm_password.setCustomValidity("");
    }
}

pass.onchange = validatePassword;
con_pass.onkeyup = validatePassword;

window.onscroll = function() {
    Navigation();
};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function Navigation() {
    if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky");
    } else {
        navbar.classList.remove("sticky");
    }
}
