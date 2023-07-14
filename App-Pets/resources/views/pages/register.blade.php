<form action="{{ route('login.register') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" required>
    </div>

    <div>
        <label for="email">Correo electrónico:</label>
        <input type="email" name="email" id="email" required>
    </div>

    <div>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required autocomplete="new-password">
    </div>
    
    <div>
        <label for="password_confirmation">Confirmar contraseña:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required autocomplete="new-password">
    </div>
    
{{-- 
    <div>
        <label for="photo">Foto:</label>
        <input type="file" name="photo" id="photo">
    </div> --}}

    <button type="submit">Registrarse</button>
</form>
