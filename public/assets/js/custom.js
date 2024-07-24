document.getElementById('togglePassword').addEventListener('click', function () {
    var passwordInput = document.getElementById('passwordInput');
    var type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    this.querySelector('i').classList.toggle('fa-eye-slash');
    this.querySelector('i').classList.toggle('fa-eye');
});
