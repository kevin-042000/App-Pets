<div class="container-form-user-profile">
    <form   class="form-create form-perfile-user"  action="{{ route('user-profile.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="input-row">
            <select name="gender" id="gender">
                <option value="">Selecciona tu género</option>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
            </select>
            <input type="date" name="birthdate" id="birthdate" placeholder="Fecha de nacimiento">
        </div>

     
        <div class="input-row">
            <input type="email" id="contact_email" name="contact_email" placeholder="Correo de contacto">
        </div>

        <div class="input-row">
            <span class="contact-email-error error-message alert alert-danger message-profile"></span>
        </div>
    
        <div class="input-colum">
            <textarea name="bio" id="bio" placeholder="Biografía" ></textarea>
            <span class="bio-error error-message alert alert-danger"></span>
    
            <input type="file" name="photo" id="photo">
            <span class="error-message photo-error"></span>
        </div>
    
        <div class="btn-form-edit">
            <button class="button" type="submit">Publicar</button>
        </div>
    </form>
    
</div>