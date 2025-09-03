// login.js

document.getElementById("togglePassword").addEventListener("click", function () {
    const passwordInput = document.getElementById("password");
    const icon = this;

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    }
    else {
        passwordInput.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
});


function validateForm(event) {
    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value.trim();
    let emailError = document.getElementById("emailError");
    let passwordError = document.getElementById("passwordError");
    let isValid = true;

    emailError.innerHTML = "";
    passwordError.innerHTML = "";

    if (!email) {
        emailError.innerHTML = "Email is required!";
        isValid = false;
    }

    if (!password) {
        passwordError.innerHTML = "Password is required!";
        isValid = false;
    }

    // Prevent form submission only if invalid
    if (!isValid) {
        event.preventDefault();
    }
}
