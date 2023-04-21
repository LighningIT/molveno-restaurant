const pwField = document.getElementById("password");
const togglePassword = document.getElementById("toggle-password");
const togglePasswordLabel = document.getElementById("toggle-password-label");

togglePassword.addEventListener('click', toggleClicked);

document.addEventListener("DOMContentLoaded", () => {
    togglePasswordLabel.style.backgroundImage = "url('http://0.0.0.0:5173/resources/img/visible-eye.svg')";
})

function toggleClicked() {
    pwField.classList.toggle("visible");
    if (pwField.type == "password") {
        pwField.type = "text";
        togglePasswordLabel.style.backgroundImage = "url('http://0.0.0.0:5173/resources/img/visible-eye-hide.svg')";
    } else {
        pwField.type = "password";
        togglePasswordLabel.style.backgroundImage = "url('http://0.0.0.0:5173/resources/img/visible-eye.svg')";

    }
}
