<div class="container-form-user-profile">
<form class="form-create" action="{{ route('user-profile.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="input-row">
        <select name="gender" id="gender" required>
          <option value="">Selecciona una opción</option>
          <option value="masculino">Masculino</option>
          <option value="femenino">Femenino</option>
        </select>
        <input type="date" name="birthdate" id="birthdate" required placeholder="Fecha de nacimiento">     
    </div>

    <div class="input-row">
        <!-- Input para el correo electrónico -->
        <input type="email" id="email" name="email" placeholder="Correo de contacto" >
        <!-- Input para el número de teléfono/celular -->
        <input type="tel" id="phone" name="phone" pattern="\+54 9 \d{3} \d{3}-\d{4}" placeholder="+54 9 351 123-4567" >

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