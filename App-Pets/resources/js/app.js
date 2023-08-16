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
document.addEventListener("DOMContentLoaded", function() {

    const registrationForm = document.querySelector(".form-register-login");
    if (registrationForm) {
        registrationForm.addEventListener("submit", function(event) {
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
    }

});



//validacion de login
document.addEventListener("DOMContentLoaded", function() {

    const loginForm = document.querySelector(".form-register-login");
    
    if (loginForm) { // Verifica si el formulario existe antes de agregar el event listener.
        loginForm.addEventListener("submit", function(event) {
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
    }

});





// validacion de publicacion lost pet
document.addEventListener("DOMContentLoaded", function() {

    const lostPetForm = document.querySelector(".lostPetForm");
    if (lostPetForm) {
        lostPetForm.addEventListener("submit", function(event) {
            let valid = true;

        // Validación de nombre de mascota
        let petName = document.querySelector(".validate-name").value;
        let petNameError = document.querySelector(".name-error");
        
        if (!petName.trim()) { 
            valid = false;
            petNameError.textContent = "El campo nombre no puede estar vacío.";
            petNameError.style.display = "block";
        } else if (petName.length < 3 || petName.length > 30) {
            valid = false;
            petNameError.textContent = "El nombre de la mascota debe tener entre 3 y 30 caracteres.";
            petNameError.style.display = "block"; 
        } else {
            petNameError.style.display = "none";
        }


            // Validación de ubicación
            let location = document.querySelector(".validate-location").value;
            let locationError = document.querySelector(".location-error");
            if (!location) {
                valid = false;
                locationError.textContent = "El campo ubicación no puede estar vacío.";
                locationError.style.display = "block"; 
            } else {
                locationError.style.display = "none"; 
            }

          // Validación de descripción
          let description = document.querySelector(".validate-description").value;
          let descriptionError = document.querySelector(".description-error");

          if (!description) {
            valid = false;
            descriptionError.textContent = "La descripción no puede estar vacía.";
            descriptionError.style.display = "block"; 
        } else if (description.length < 3 || description.length > 255) {
            valid = false;
            descriptionError.textContent = description.length < 3 ? "La descripción es demasiado corta." : "Has llegado al máximo de caracteres disponibles.";
            descriptionError.style.display = "block"; 
        } else {
            descriptionError.style.display = "none"; 
        }

            // Validación de fecha
            let dateLost = document.querySelector(".validate-date").value;
            let dateLostError = document.querySelector(".date-error");
            if (!dateLost) {
                valid = false;
                dateLostError.textContent = "El campo de fecha no puede estar vacío.";
                dateLostError.style.display = "block"; 
            } else {
                dateLostError.style.display = "none"; 
            }

            // Validación de foto
            let photo = document.querySelector(".validate-photo");
            let photoError = document.querySelector(".photo-error");
            if (photo.files && photo.files[0] && photo.files[0].size > 2048 * 1024) {
                valid = false;
                photoError.textContent = "El archivo es muy pesado.";
                photoError.style.display = "block";
            } else {
                photoError.style.display = "none";
            }

            if (!valid) {
                event.preventDefault(); // Evita que el formulario se envíe si hay errores
            }
        });
    }

});


//validacion de found pet
document.addEventListener("DOMContentLoaded", function() {

    const foundPetForm = document.querySelector(".foundPetForm");

    if (foundPetForm) {
        foundPetForm.addEventListener("submit", function(event) {
            let valid = true;

            // Validación de título
            let title = document.querySelector(".validate-title").value;
            let titleError = document.querySelector(".title-error");
            if (title.length < 3 || title.length > 30) {
                valid = false;
                titleError.textContent = title.length < 3 ? "El título es demasiado corto." : "El título es demasiado largo.";
                titleError.style.display = "block";
            } else {
                titleError.style.display = "none";
            }

            // Validación de ubicación
            let location = document.querySelector(".validate-location").value;
            let locationError = document.querySelector(".location-error");
            if (!location) {
                valid = false;
                locationError.textContent = "El campo ubicación no puede estar vacío.";
                locationError.style.display = "block";
            } else {
                locationError.style.display = "none";
            }

            // Validación de descripción
            let description = document.querySelector(".validate-description").value;
            let descriptionError = document.querySelector(".description-error");
            if (description.length < 3 || description.length > 255) {
                valid = false;
                descriptionError.textContent = description.length < 3 ? "La descripción es demasiado corta." : "Has llegado al máximo de caracteres disponibles.";
                descriptionError.style.display = "block";
            } else {
                descriptionError.style.display = "none";
            }

            // Validación de fecha
            let dateFound = document.querySelector(".validate-date").value;
            let dateFoundError = document.querySelector(".date-found-error");
            if (!dateFound) {
                valid = false;
                dateFoundError.textContent = "El campo de fecha no puede estar vacío.";
                dateFoundError.style.display = "block";
            } else {
                dateFoundError.style.display = "none";
            }

            // Validación de foto
            let photo = document.querySelector(".validate-photo");
            let photoError = document.querySelector(".photo-error");
            if (photo.files && photo.files[0] && photo.files[0].size > 2048 * 1024) {
                valid = false;
                photoError.textContent = "El archivo es muy pesado.";
                photoError.style.display = "block";
            } else {
                photoError.style.display = "none";
            }

            if (!valid) {
                event.preventDefault(); // Evita que el formulario se envíe si hay errores
            }
        });
    }
});


//validacion del form del perfil de usuario
document.querySelector('.form-perfile-user').addEventListener('submit', function(e) {
    // Restablece todos los mensajes de error
    document.querySelectorAll('.error-message').forEach(el => {
        el.textContent = '';
        el.style.display = 'none'; // oculta todos los mensajes de error al principio
    });

    let hasErrors = false;

    // Validar la foto
    const photo = document.getElementById('photo').files[0];
    const photoError = document.querySelector('.photo-error');
    if(photo && photo.size > 2 * 1024 * 1024) { // Mayor a 2MB
        photoError.textContent = 'El archivo es muy pesado';
        photoError.style.display = 'block'; // muestra el mensaje de error
        hasErrors = true;
    }

    // Validar la biografía
    const bio = document.getElementById('bio').value;
    const bioError = document.querySelector('.bio-error');
    if(bio.length > 255) {
        bioError.textContent = 'Has excedido el máximo de caracteres disponibles';
        bioError.style.display = 'block'; // muestra el mensaje de error
        hasErrors = true;
    }

    // Validar el correo electrónico
    const email = document.getElementById('contact_email').value;
    const emailError = document.querySelector('.contact-email-error');
    if(email && !/^\S+@\S+\.\S+$/.test(email)) {
        emailError.textContent = 'Ingresa un correo válido';
        emailError.style.display = 'block'; // muestra el mensaje de error
        hasErrors = true;
    }

    if(hasErrors) {
        e.preventDefault();
    }
});









