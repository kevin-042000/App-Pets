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






