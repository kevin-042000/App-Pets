<div class="container-like">
    <button wire:click="toggleLike" wire:loading.attr="disabled">
        <!-- Aquí, podemos usar un icono de corazón para representar el "like". Cambiará dependiendo de si el usuario ha dado "like" a la publicación o no. -->
        @if($isLiked)
        <i class="bi bi-suit-heart-fill text-danger"></i> <!-- Si el usuario ha dado "like", el corazón estará lleno. -->
        @else
        <i class="bi bi-suit-heart text-danger"></i> <!-- Si el usuario no ha dado "like", el corazón estará vacío. -->
        @endif
    </button>
    <span>{{ $likesCount }}</span> <!-- Aquí mostramos la cuenta actual de "likes". -->
</div>






