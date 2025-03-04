document.addEventListener("DOMContentLoaded", function () {
    let emailField = document.getElementById("email");
    let emailStatus = document.getElementById("emailStatus");
    let passwordField = document.getElementById("password");
    let confirmPasswordField = document.getElementById("confirmPassword");
    let passwordStrength = document.getElementById("passwordStrength");
    let registerButton = document.getElementById("registerButton");

    if (emailField) {
        emailField.addEventListener("input", function () {
            let email = emailField.value.trim();
            if (email.length > 5) {
                checkEmailAvailability(email);
            } else {
                emailStatus.textContent = "";
            }
        });
    }

    function checkEmailAvailability(email) {
        fetch('/api/check-email', {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: "email=" + encodeURIComponent(email)
        })
        .then(response => response.json())
        .then(data => {
            if (data.exists) {
                emailStatus.textContent = "❌ Email already in use";
                emailStatus.style.color = "red";
                registerButton.disabled = true;
            } else {
                emailStatus.textContent = "✅ Email available";
                emailStatus.style.color = "green";
                registerButton.disabled = false;
            }
        })
        .catch(error => console.error("Error:", error));
    }

    function checkPasswordStrength(password) {
        if (password.length >= 16) return { label: "🔥 Very Strong", color: "green" };
        if (password.length >= 12) return { label: "✅ Strong", color: "blue" };
        if (password.length >= 8) return { label: "⚠️ Weak", color: "orange" };
        return { label: "❌ Too Weak", color: "red" };
    }

    function validatePasswords() {
        let password = passwordField.value;
        let confirmPassword = confirmPasswordField.value;
        let strength = checkPasswordStrength(password);

        passwordStrength.textContent = strength.label;
        passwordStrength.style.color = strength.color;

        confirmPasswordField.style.borderColor = (password === confirmPassword) ? "green" : "red";

        registerButton.disabled = !(password.length >= 8 && password === confirmPassword);
    }

    passwordField.addEventListener("input", validatePasswords);
    confirmPasswordField.addEventListener("input", validatePasswords);
});
