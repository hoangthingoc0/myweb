window.togglePassword = function() {
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.getElementById('togglePassword');

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleIcon.textContent = "🙈";
    } else {
        passwordInput.type = "password";
        toggleIcon.textContent = "🙉";
    }
};
