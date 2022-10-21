//Variables
//Expresion regular
const er = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

//Seleccionar boton de enviar
const btnEnviar = document.querySelector('#register');

//Seleccionar formulario
const formulario = document.querySelector('#formulario');

//Seleccionar campo de email
const email = document.querySelector('#email');

//Seleccionar campo de email
// const password = document.querySelector('#password');

//Seleccionar campo de email
const password_confirmation = document.querySelector('#password_confirmation');

//Seleccionar campo de email
const nombre = document.querySelector('#nombre');

eventListeners();
function eventListeners() {
    document.addEventListener('DOMContentLoaded', startApp);

    //Campos de el formulario
    email.addEventListener('blur', validateForm);
    // password.addEventListener('blur', validateForm);
    nombre.addEventListener('blur', validateForm);
}


//Funciones
function startApp() {
    btnEnviar.disabled = true;
}

function validateForm(e) {
    if (e.target.value.length > 0) {
        //Elimina los errores...
        const error = document.querySelector('p.error');
        if (error) {
            error.remove();
        }

        e.target.classList.remove('is-invalid');
        e.target.classList.add('is-valid');
    }  else {
        e.target.classList.remove('is-valid');
        e.target.classList.add('is-invalid');
        showError('Todos los campos son obligatorios');
    }

    if ( e.target.type === 'email' ) {

        if ( er.test( e.target.value ) ) {
           //Elimina los errores...
            const error = document.querySelector('p.error');
            if (error) {
                error.remove();
            }
            
            e.target.classList.remove('is-invalid');
            e.target.classList.add('is-valid');
        }else {
            e.target.classList.remove('is-valid');
            e.target.classList.add('is-invalid');

            showError('Email no valido');
        }

    }

    if (er.test( email.value ) /* && password.value != ''*/ && nombre.value != '') {
        btnEnviar.disabled = false;
    }

}

function showError(mensaje) {
    const mensajeError = document.createElement('p');

    mensajeError.textContent = mensaje;
    mensajeError.classList.add('alerta', 'error');

    const errores = document.querySelectorAll('.error');
    if (errores.length === 0 ) {
        formulario.appendChild(mensajeError);
    }
}