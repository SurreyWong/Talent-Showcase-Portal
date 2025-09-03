function validatePassword() {
    const password = document.getElementById("password").value.trim();
    const confirmPassword = document.getElementById("confirmPassword").value.trim();

    const errorElement = document.getElementById("passwordError");
    const errorMatch = document.getElementById("confirmPasswordError");

    const minlength = 8;
    let isValid = true;

    errorElement.innerHTML = "";
    errorMatch.innerHTML = "";

    if (!password) {
        errorElement.innerHTML = "Password is required!";
        isValid = false;
    } else if (password.length < minlength) {
        errorElement.innerHTML = `Password must be at least ${minlength} characters long.`;
        isValid = false;
    } else {
        if (!/[A-Z]/.test(password)) {
            errorElement.innerHTML = "Password must contain at least one capital letter.";
            isValid = false;
        } else if (!/\d/.test(password)) {
            errorElement.innerHTML = "Password must contain at least one number.";
            isValid = false;
        }
    }

    if (password !== confirmPassword) {
        errorMatch.innerHTML = "Passwords do not match!";
        isValid = false;
    }

    return isValid;
}