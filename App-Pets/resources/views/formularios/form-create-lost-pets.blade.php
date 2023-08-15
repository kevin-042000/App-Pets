<form id="lostPetForm" class="form-create" action="{{ route('lost-pets.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="input-row">
        <input class="validate-name" type="text" name="name" id="name" placeholder="Nombre de Mascota">
        <input class="validate-location" type="text" name="location" id="location" placeholder="Ubicación">
    </div>

    <div class="input-row">
        <span class="error-message name-error alert alert-danger message-pet"></span>
        <span class="error-message location-error alert alert-danger message-pet"></span>

    </div>

    <div class="input-colum">
        <textarea class="validate-description" name="description" id="description" placeholder="Descripción"></textarea>
        <span class="error-message description-error alert alert-danger"></span>
    </div>

    <div class="input-row">
        <input class="validate-date" type="date" name="date_lost" id="date_lost">
        <input class="validate-photo" type="file" name="photo" id="photo">
    </div>

    <div class="input-row">
        <span class="error-message date-error alert alert-danger"></span>
        <span class="error-message photo-error alert alert-danger"></span>
    </div>

    <div class="btn-form-edit">
        <button class="button" type="submit">Publicar</button>
    </div>
</form>

