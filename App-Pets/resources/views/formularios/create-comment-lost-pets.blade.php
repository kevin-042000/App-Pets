<form action="{{ route('comments.storeLostPet', ['lost_pet_id' => $pet->id ?? $LostPet->id]) }}" method="POST">
    @csrf

    <div class="form-group">
        <textarea class="form-control" id="body" name="body" rows="3" placeholder="Realiza un comenario"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Publicar comentario</button>
</form>

