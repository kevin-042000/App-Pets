<form  class="form-create foundPetForm" action="{{ route('found-pets.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="input-row">
        <input class="validate-title" type="text" name="title" id="title" placeholder="Titulo">
        <input class="validate-location" type="text" name="location" id="location" placeholder="Ubicación">
    </div>

    <div class="input-row">
        <span class="title-error error-message alert alert-danger"></span>
        <span class="location-error error-message alert alert-danger"></span>
    </div>



    <div class="input-colum">
        <textarea class="validate-description" name="description" id="description" placeholder="Descripción"></textarea>
        <span class="description-error error-message alert alert-danger"></span>
    </div>

    <div class="input-row">
        <input class="validate-date" type="date" name="date_found" id="date_found">
        <input class="validate-photo" type="file" name="photo" id="photo">
    </div>

    <div class="input-row">
        <span class="error-message date-found-error alert alert-danger"></span>
        <span class="error-message photo-error alert alert-danger"></span>
    </div>

    <div class="btn-form-edit">
        <button class="button" type="submit">Publicar</button>
    </div>
</form>
