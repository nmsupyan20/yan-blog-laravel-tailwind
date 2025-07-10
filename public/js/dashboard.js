// Hamburger Menu
const sidebar = document.getElementById('sidebar');

const showHideSidebar = () => {
    if (sidebar.classList.contains('-left-full')) {
        sidebar.classList.add('left-0');
        sidebar.classList.remove('-left-full');
    } else {
        sidebar.classList.add('-left-full');
        sidebar.classList.remove('left-0');
    }
}

// Alert cancel button
const myAlert = document.getElementById('alert');

const showHideAlert = () => {
    if (myAlert.classList.contains('hidden')) {
        myAlert.classList.remove('hidden');
    } else {
        myAlert.classList.add('hidden');
    }
}

// Disable input password
const cekEditPassword = document.getElementById('cekEditPassword');
const passwordInputField = document.getElementById('passwordUser');

if (passwordInputField !== null) {
    passwordInputField.disabled = true;
}

const disableInputPassword = () => {
    if (cekEditPassword.checked) {
        passwordInputField.disabled = false;
        passwordInputField.focus();
    } else {
        passwordInputField.disabled = true;
    }
}