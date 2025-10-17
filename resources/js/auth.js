function togglePassword() {
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.querySelector('#togglePassword i');
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.replace('fa-eye-slash', 'fa-eye');
    }
}

document.querySelector('form').addEventListener('submit', () => {
    const button = document.getElementById('loginButton');
    button.disabled = true;
    button.innerHTML = '<span>Đang xử lý...</span><i class="fas fa-spinner fa-spin"></i>';
});