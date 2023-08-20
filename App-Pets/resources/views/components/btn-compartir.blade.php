<div class="compartir">
    <div class="btn-group dropend">
        <button class="btn btn-secondary dropdown-toggle btn-compartir" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            Compartir
        </button>
        <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton">
            <li>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" >
                    <i class="bi bi-facebook"></i>
                    Facebook
                </a>
            </li>
            <li>
                <a href="https://api.whatsapp.com/send?text={{ urlencode('Echa un vistazo a esto: ' . request()->fullUrl()) }}" target="_blank" >
                    <i class="bi bi-whatsapp"></i>
                    Whatsapp
                </a>                                                                                  
            </li>
            <li>
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode('Echa un vistazo a esto:') }}" target="_blank">
                    <i class="bi bi-twitter"></i>
                    Twitter
                </a>
            </li>
        </ul>
    </div>
</div>