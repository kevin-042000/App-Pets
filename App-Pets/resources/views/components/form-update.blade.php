<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf

    <div>
        <label for="name">Nombre de la mascota:</label>
        <input type="text" name="name" id="name" value="{{ $Vname ?? '' }}" required>
    </div>

    <div>
        <label for="description">Descripción:</label>
        <textarea name="description" id="description" required>{{ $Vdescription ?? '' }}</textarea>
    </div>

    <div>
        <label for="location">Ubicación:</label>
        <input type="text" name="location" id="location" value="{{ $Vlocation ?? '' }}">
    </div>

    <div>
        <label for="date_lost">Fecha de pérdida:</label>
        <input type="date" name="date_lost" id="date_lost" value="{{ $VdateLost ?? '' }}" required>
    </div>

    <div>
        <label for="photo">Foto:</label>
        <input type="file" name="photo" id="photo">
    </div>

    <button type="submit">Actualizar</button>
</form>