document.addEventListener("DOMContentLoaded", function () {
    function toggleVisibility(buttonId, fieldId) {
        let button = document.getElementById(buttonId);
        let field = document.getElementById(fieldId);

        if (button && field) {
            button.addEventListener("click", function () {
                field.type = (field.type === "password") ? "text" : "password";
            });
        }
    }

    toggleVisibility("togglePassword", "password");
    toggleVisibility("toggleConfirmPassword", "confirmPassword"); // Works for register.php
});
