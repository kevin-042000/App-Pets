<div class="container-form-comments-pets">
    <form class="commentForm" action="{{ route('comments.storeFoundPet', ['found_pet_id' => $pet->id ?? $FoundPet->id]) }}" method="POST">
        @csrf

        <div class="form-group">
            <textarea class="form-control bodyTextarea" name="body" rows="3" ></textarea>
            <!-- Aquí se mostrará el mensaje de error -->
            <span class="error-message  alert alert-danger container-comment-error"></span>
        </div>

        <button type="submit" class="btn btn-primary ">Publicar comentario</button>
    </form>
</div>

