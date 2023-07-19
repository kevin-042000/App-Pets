<form class="form-create" action="{{ route('user-profile.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <h4>Subir datos</h4>
    <div class="input-row">
        <input type="gender" name="gender" id="gender" placeholder="Genero" required>
        <input type="date" name="birthdate" id="birthdate" required placeholder="Fecha de nacimiento">     
    </div>

    <div class="input-colum">
        <textarea name="bio" id="bio" placeholder="Biografia" required></textarea>        
    </div>
    
    <button type="submit">Publicar</button>
</form>