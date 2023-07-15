<form class="form-create" action="{{ $action }}" method="POST" enctype="multipart/form-data">

    @csrf

    <h3>Informa sobre tu Mascota</h3>
    <div>
        <label for="name">Nombre de la mascota:</label>
        <input type="text" name="name" id="name" required>
    </div>

    <div>
        <label for="description">Descripción:</label>
        <textarea name="description" id="description" required></textarea>
    </div>

    <div>
        <label for="location">Ubicación:</label>
        <input type="text" name="location" id="location">
    </div>

    <div>
        <label for="date_lost">Fecha de pérdida:</label>
        <input type="date" name="date_lost" id="date_lost" required>
    </div>

    <div>
        <label for="photo">Foto:</label>
        <input type="file" name="photo" id="photo">
    </div>

    <button type="submit">Guardar</button>
</form>

