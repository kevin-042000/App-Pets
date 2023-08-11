<div class="container-form-comments-pets">
<form action="{{ route('comments.storeFoundPet', ['found_pet_id' => $pet->id ?? $FoundPet->id]) }}" method="POST">
    @csrf

    <div class="form-group">
        <textarea class="form-control" id="body" name="body" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Publicar comentario</button>
</form>
</div>