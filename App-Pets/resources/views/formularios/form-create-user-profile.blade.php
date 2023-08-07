<div class="container-form-user-profile">
<form class="form-create" action="{{ route('user-profile.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="input-row">
        <select name="gender" id="gender">
          <option value="">Selecciona tu genero</option>
          <option value="masculino">Masculino</option>
          <option value="femenino">Femenino</option>
        </select>
        <input type="date" name="birthdate" id="birthdate"  placeholder="Fecha de nacimiento">     
    </div>
 
    <div class="input-row">
        <!-- Input para el correo electrónico -->
        <input type="email" id="contact_email" name="contact_email" placeholder="Correo de contacto" >
        <!-- Input para el número de teléfono/celular -->
        <input type="tel" id="contact_number" name="contact_number"  placeholder="Numero de contacto" >
    </div>

    <div class="input-colum">
        <textarea name="bio" id="bio" placeholder="Biografia" required></textarea>
        <input type="file" name="photo" id="photo" >        
    </div>

    <div class="btn-form-edit">
    <button class="button" type="submit">Publicar</button>
    </div>
</form>
</div>