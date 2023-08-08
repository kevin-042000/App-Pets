import './bootstrap';
import 'bootstrap';


// document.addEventListener('DOMContentLoaded', function () {
//     var btn = document.getElementById('toggle-comments-btn');
//     var commentsSection = document.getElementById('comments-section');

//     btn.addEventListener('click', function () {
//         var isHidden = commentsSection.style.display === 'none';

//         if (isHidden) {
//             // Si los comentarios están ocultos, los mostramos
//             commentsSection.style.display = 'block';
//         } else {
//             // Si los comentarios están visibles, los ocultamos
//             commentsSection.style.display = 'none';
//         }
//     });
// });

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
