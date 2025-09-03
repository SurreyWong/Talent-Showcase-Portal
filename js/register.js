function validatePassword() {
    let password = document.getElementById("password").value;
    let confirmPassword = document.getElementById("confirmPassword").value;

    let errorElement = document.getElementById("passwordError");
    let errorMatch = document.getElementById("confirmPasswordError");

    let isTalentChecked = document.getElementById("isTalent").checked;

    let minlength = 8;
    let isValid = true;

    errorElement.innerHTML = "";
    errorMatch.innerHTML = "";

    if (!password) {
        errorElement.innerHTML = "Password is required!";
        isValid = false;
    }
    else if (password.length < minlength) {
        errorElement.innerHTML = "Please enter a password that is at least" + minlength + "characters long";
        isValid = false;
    }
    else {
        const hasCapital = /[A-Z]/g;
        if (!hasCapital.test(password)) {
            errorElement.innerHTML = "Please use at least one capital letters.";
            isValid = false;
        }

        const hasNum = /\d/g;
        if (!hasNum.test(password)) {
            errorElement.innerHTML = "Please use at least one number";
            isValid = false;
        }

    }

    if (password !== confirmPassword) {
        errorMatch.innerHTML = "Password do not match!";
        isValid = false;

    }

    if (!isTalentChecked) {
        let proceed = confirm("You did not choose to register as a Talent. Continue as a regular user?");
        if (!proceed) {
            isValid = false;
        }
    }

    return isValid;
}

