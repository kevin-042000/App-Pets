<form action="{{ route('comments.storeLostPet', ['lost_pet_id' => $pet->id ?? $LostPet->id]) }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="body">Comentario</label>
        <textarea class="form-control" id="body" name="body" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Publicar comentario</button>
</form>

