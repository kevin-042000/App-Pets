<div class="container-form-user-profile">
    <form class="form-create" action="{{ route('user-profile.update', $userProfile->id) }}"  method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        
        <div class="input-row">
            <select name="gender" id="gender">
                <option value="">Selecciona tu género</option>
                <option value="masculino" {{ $userProfile->gender === 'masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="femenino" {{ $userProfile->gender === 'femenino' ? 'selected' : '' }}>Femenino</option>
            </select>
            <input type="date" name="birthdate" id="birthdate"  value="{{ $user->birthdate }}">
        </div>

        <div class="input-row">
            <span class="gender-error error-message alert alert-danger message-profile"></span>
            <span class="birthdate-error error-message alert alert-danger message-profile"></span>
        </div>
     
        <div class="input-row">
            <input type="email" id="contact_email" name="contact_email"  value="{{ $userProfile->contact_email }}">
            <input type="tel" id="contact_number" name="contact_number"  value="{{ $userProfile->contact_number }}">
        </div>

        <div class="input-row">
            <span class="contact-email-error error-message alert alert-danger message-profile"></span>
            <span class="contact-number-error error-message alert alert-danger message-profile"></span>
        </div>
    
        <div class="input-colum">
            <textarea name="bio" id="bio" >{{ $userProfile->bio }}</textarea>
            <span class="bio-error error-message alert alert-danger"></span>
    
            <input type="file" name="photo" id="photo">
            <span class="error-message photo-error"></span>
        </div>
    
        <div class="btn-form-edit">
            <button class="button" type="submit">Publicar</button>
        </div>
    </form>
</div>
