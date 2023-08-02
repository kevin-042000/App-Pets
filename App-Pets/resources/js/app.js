import './bootstrap';
import 'bootstrap';


document.addEventListener('DOMContentLoaded', function () {
    var btn = document.getElementById('toggle-comments-btn');
    var commentsSection = document.getElementById('comments-section');

    btn.addEventListener('click', function () {
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

