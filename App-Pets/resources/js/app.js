import './bootstrap';
import 'bootstrap';

//codigo para el background estatico de los li del menu
const list = document.querySelectorAll('.list')
function activarLink(){
    list.forEach((item)=> 
    item.classList.remove('active'))
    this.classList.add('active')
}
list.forEach((item)=>
item.addEventListener('click', activarLink)
)


//codigo para mostrar y ocultar los comentarios
document.addEventListener('DOMContentLoaded', function () {
    // Selecciona todos los botones y las secciones de comentarios
    var btns = document.querySelectorAll('.toggle-comments-btn');
    var commentsSections = document.querySelectorAll('.comments-section-visible');

    // Agrega un evento a cada botón
    btns.forEach((btn, index) => {
        btn.addEventListener('click', function () {
            var commentsSection = commentsSections[index]; // Obtiene la sección de comentarios correspondiente
            var isHidden = commentsSection.style.display === 'none';

            if (isHidden) {
                // Si los comentarios están ocultos, los mostramos
                commentsSection.style.display = 'block';
            } else {
                // Si los comentarios están visibles, los ocultamos
                commentsSection.style.display = 'none';
            }
        });
    });
});



// al abrirse un modal modifica el ancho del navbar
document.addEventListener('DOMContentLoaded', () => {
    const navbar = document.getElementById('myNavbar');
    const modalButtons = document.querySelectorAll('.openModalButton');
    const modals = document.querySelectorAll('.modal');

    modalButtons.forEach(button => {
        button.addEventListener('click', () => {
            navbar.style.width = "102%";
        });
    });

    modals.forEach(modal => {
        modal.addEventListener('hidden.bs.modal', () => {
            navbar.style.width = "100%";  // Vuelve al ancho original
        });
    });
});


// validacion de formularios del lado del cliente

//validacion de formulario de comentarios
document.addEventListener('DOMContentLoaded', function() {
    const forms = document.querySelectorAll('.commentForm');
    forms.forEach(form => {
        const bodyTextarea = form.querySelector('.bodyTextarea');
        const errorMessage = form.querySelector('.error-message');

        form.addEventListener('submit', function(event) {
            // Limpiar el mensaje de error anterior
            errorMessage.textContent = '';
            errorMessage.style.display = 'none';

            // Si el textarea está vacío, muestra el mensaje de error y evita que el formulario se envíe
            if (!bodyTextarea.value.trim()) {
                errorMessage.textContent = 'No puede estar vacío el comentario.';
                errorMessage.style.display = 'block';
                event.preventDefault(); // Evita que el formulario se envíe
            }
        });
    });
});

//validacion de registro
document.querySelector(".form-register-login").addEventListener("submit", function(event) {
    let valid = true;

    // Validación de nombre
    let name = document.querySelector(".input-name").value;
    let nameError = document.querySelector(".name-error");
    if(name.length < 3 || name.length > 30) {
        valid = false;
        nameError.textContent = "El nombre debe tener entre 3 y 30 caracteres.";
        nameError.style.display = "block"; // Mostrar mensaje de error
    } else {
        nameError.style.display = "none"; // Ocultar mensaje de error
    }

    // Validación de email
    let email = document.querySelector(".input-email").value;
    let emailError = document.querySelector(".email-error");
    let emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if(!emailPattern.test(email)) {
        valid = false;
        emailError.textContent = "Por favor, ingrese un correo electrónico válido.";
        emailError.style.display = "block"; // Mostrar mensaje de error
    } else {
        emailError.style.display = "none"; // Ocultar mensaje de error
    }

    // Validación de contraseña
    let password = document.querySelector(".input-password").value;
    let passwordError = document.querySelector(".password-error");
    if(password.length < 6 || password.length > 16 || !password) {
        valid = false;
        passwordError.textContent = !password ? "La contraseña no puede estar vacía." : "La contraseña debe tener entre 6 y 16 caracteres.";
        passwordError.style.display = "block"; // Mostrar mensaje de error
    } else {
        passwordError.style.display = "none"; // Ocultar mensaje de error
    }

    // Validación de confirmación de contraseña
    let passwordConfirmation = document.querySelector(".input-password-confirmation").value;
    let passwordConfirmationError = document.querySelector(".password-confirmation-error");
    if(!passwordConfirmation) {
        valid = false;
        passwordConfirmationError.textContent = "La confirmación de contraseña no puede estar vacía.";
        passwordConfirmationError.style.display = "block"; // Mostrar mensaje de error
    } else if(password !== passwordConfirmation) {
        valid = false;
        passwordConfirmationError.textContent = "Las contraseñas no coinciden.";
        passwordConfirmationError.style.display = "block"; // Mostrar mensaje de error
    } else {
        passwordConfirmationError.style.display = "none"; // Ocultar mensaje de error
    }

    if(!valid) {
        event.preventDefault(); // Evita que el formulario se envíe si hay errores
    }
});



//validacion de login
document.querySelector(".form-register-login").addEventListener("submit", function(event) {
    let valid = true;

    // Validación de email
    let email = document.querySelector(".input-email").value;
    let emailError = document.querySelector(".email-error");
    let emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if(!emailPattern.test(email) || !email) {
        valid = false;
        emailError.textContent = !email ? "El correo electrónico no puede estar vacío." : "Por favor, ingrese un correo electrónico válido.";
        emailError.style.display = "block";
    } else {
        emailError.style.display = "none";
    }

    // Validación de contraseña
    let password = document.querySelector(".input-password").value;
    let passwordError = document.querySelector(".password-error");
    if(password.length < 6 || password.length > 16 || !password) {
        valid = false;
        passwordError.textContent = !password ? "La contraseña no puede estar vacía." : "La contraseña debe tener entre 6 y 16 caracteres.";
        passwordError.style.display = "block";
    } else {
        passwordError.style.display = "none";
    }

    if(!valid) {
        event.preventDefault();
    }
});



// validacion de publicacion 
