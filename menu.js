let hamb = document.querySelector(".hamb");
let navMenu = document.querySelector(".nav_menu");
hamb.addEventListener("click", mobileMenu);
function mobileMenu() {
    hamb.classList.toggle("active");
    navMenu.classList.toggle("active");
}

document.getElementById("openRegistration").addEventListener("click", function() {
document.getElementById("registrationModal").style.display = "block";
});
function closeRegistrationForm() {
document.getElementById("registrationModal").style.display = "none";
}