<form class="form-create" action="{{ route('found-pets.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <h4>Publica una mascota encontrada</h4>
    <div class="input-row">
        <input type="text" name="title" id="title" placeholder="Titulo" required>
        <input type="text" name="location" placeholder="Ubicacion" id="location">
    </div>

    <div class="input-colum">
        <input type="date" name="date_found" id="date_found" required >
        <textarea name="description" id="description" placeholder="Description" required></textarea>        
        <input type="file" name="photo" id="photo">
    </div>
     
    <button type="submit">Publicar</button>
</form>
