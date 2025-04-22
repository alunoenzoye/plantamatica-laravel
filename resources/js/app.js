import './bootstrap';

window.togglePassword = function (fieldId, toggleIcon) {
    const field = document.getElementById(fieldId);
    const icon = toggleIcon.querySelector('i');

    if (field.type === "password") {
        field.type = "text";
        icon.classList.remove('bi', 'bi-eye');
        icon.classList.add('bi', 'bi-eye-slash');
    } else {
        field.type = "password";
        icon.classList.remove('bi', 'bi-eye-slash');
        icon.classList.add('bi', 'bi-eye');
    }
}