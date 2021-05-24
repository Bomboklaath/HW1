function jsonControlloUsername(json) {
    if (formStatus.username = !json.exists) {
        document.querySelector('.username').classList.remove('error');
    } else {
        document.querySelector('.username span').textContent = "Nome utente già utilizzato";
        document.querySelector('.username').classList.add('error');
    }
    checkForm();
}

function fetchResponse(response) {
    if (!response.ok) return null;
    return response.json();
}
function controlloUsername(event) {
    const input = document.querySelector('.username input');
    if(!/^[a-zA-Z0-9_]{1,15}$/.test(input.value)) {
        input.parentNode.querySelector('span').textContent = "Username non valido!";
        input.parentNode.classList.remove('error');
        formStatus.username = false;
        checkForm();
    } else {
        fetch("controlloUsername.php?q="+encodeURIComponent(input.value)).then(fetchResponse).then(jsonControlloUsername);
        input.parentNode.querySelector('span').textContent = "";
    }    
}


function controlloPassword(event) {
    const passwordInput = document.querySelector('.password input');
    if (formStatus.password = passwordInput.value.length >= 4) {
        document.querySelector('.password').classList.remove('error');
        document.querySelector('.password span').textContent = "";
    } else {
        document.querySelector('.password').classList.add('error');
        document.querySelector('.password span').textContent = "Password non valida: Min 8 caratteri";
    }
    checkForm();
}
function controlloConfermaPassword(event) {
    const confermaPasswordInput = document.querySelector('.conferma_password input');
    if (formStatus.confermaPassord = confermaPasswordInput.value === document.querySelector('.password input').value) {
        document.querySelector('.conferma_password').classList.remove('error');
        document.querySelector('.conferma_password span').textContent = "";
    } else {
        document.querySelector('.conferma_password').classList.add('error');
        document.querySelector('.conferma_password span').textContent = "Le password non coincidono";
    }
    checkForm();
}
function checkForm() {
    Object.keys(formStatus).length !== 3 || 
    Object.values(formStatus).includes(false);
}
const formStatus = {'upload': true};
document.querySelector('.username input').addEventListener('blur', controlloUsername);
document.querySelector('.password input').addEventListener('blur', controlloPassword);
document.querySelector('.conferma_password input').addEventListener('blur', controlloConfermaPassword);
if (document.querySelector('.error') !== null) {
    controlloUsername(); controlloPassword(); controlloConfermaPassword(); 
}