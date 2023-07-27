<form class="form-create" action="{{ route('lost-pets.store') }}" method="POST" enctype="multipart/form-data">

    @csrf
    
    <h4>Publica una mascota perdida</h4>
    <div class="input-row">
        <input type="text" name="name" id="name" placeholder="Nombre de  Mascota" required>
        <input type="text" name="location" placeholder="Ubicacion" id="location">
    </div>

    <div class="input-colum">
        <textarea name="description" id="description" placeholder="Description" required></textarea>        
    </div>

    <div class="input-row">
        <input type="date" name="date_lost" id="date_lost" required>
        <input type="file" name="photo" id="photo">
    </div> 
    
    <div class="btn-form-edit">
    <button class="button" type="submit">Publicar</button>
    </div>
</form>

