<div class="container-form-comments-pets">
<form class="commentForm" action="{{ route('comments.storeLostPet', ['lost_pet_id' => $pet->id ?? $LostPet->id]) }}" method="POST">
    @csrf

    <div class="form-group">
        <textarea class="form-control bodyTextarea" id="body" name="body" rows="3" placeholder="Realiza un comenario" ></textarea>
         <!-- Aquí se mostrará el mensaje de error -->
         <span class="error-message alert alert-danger container-comment-error" style="display: none;"></span>
    </div>

    <button type="submit" class="btn btn-primary">Publicar comentario</button>
</form>
</div>

