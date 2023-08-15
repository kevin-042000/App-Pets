<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserProfileRequest;
use App\Models\UserProfile;
use App\Models\User;
use Illuminate\View\view;
use Illuminate\http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class UserProfileController extends Controller
{

    public function store(UserProfileRequest $request): RedirectResponse
    {
        $user = Auth::user(); // Obtiene el usuario autenticado
        Log::debug('Usuario autenticado: ', ['user' => $user]);
    
        if(!$user) {
            // Redirige al usuario o muestra un mensaje de error si no está autenticado.
            return redirect()->route('login');
        }
    
        $fileName = null;
    
        // Obtiene el perfil del usuario usando la relación definida en el modelo User
        $userProfile = $user->profile;
        Log::debug('Perfil de usuario obtenido: ', ['userProfile' => $userProfile]);
    
        if(!$userProfile) {
            // Si el usuario no tiene un perfil, redirige o muestra un mensaje de error
            return redirect()->route('home.index')->with('error', 'No existe un perfil de usuario para este usuario.');
        }
    
        // Comprueba si se ha subido un archivo
        if ($request->hasFile('photo')) {
            // Si ya hay una foto, elimina la anterior
            if ($userProfile->photo) {
                Storage::delete('public/images/' . $userProfile->photo);
            }
    
            // Sube la nueva foto
            $fileName = time().'.'.$request->photo->extension();
            $request->photo->storeAs('public/images', $fileName);
    
            // Actualiza el campo 'photo' en la base de datos
            $userProfile->photo = $fileName;
        }
    
        $userProfile->bio = $request->bio;
        $userProfile->birthdate = $request->birthdate;
        $userProfile->gender = $request->gender;
        $userProfile->contact_email = $request->contact_email;
        $userProfile->contact_number = $request->contact_number;
    
        $userProfile->save();
    
        Log::debug('Perfil de usuario después de la actualización: ', ['userProfile' => $userProfile]);
    
        return redirect()->route('user-profile.showOwn');
    }
    





    public function edit(User $user)
    {
        // Obtiene el perfil del usuario autenticado
        $authUser = Auth::user();
        $userProfile = $authUser->profile;
    
        return view('formularios.form-edit-user-profile', compact('userProfile'));
    }
    
 

 


public function update(UserProfileRequest $request): RedirectResponse
{
    $user = Auth::user(); // Obtiene el usuario autenticado
    Log::debug('Usuario autenticado: ', ['user' => $user]);

    if(!$user) {
        // Redirige al usuario o muestra un mensaje de error si no está autenticado.
        return redirect()->route('login');
    }

    // Obtiene el perfil del usuario
    $userProfile = $user->profile;
    Log::debug('Perfil de usuario obtenido: ', ['userProfile' => $userProfile]);

    if(!$userProfile) {
        // Si el usuario no tiene un perfil, redirige o muestra un mensaje de error
        return redirect()->route('home.index')->with('error', 'No existe un perfil de usuario para este usuario.');
    }

    // Comprueba si se ha subido un archivo
    if ($request->hasFile('photo')) {
        // Si ya hay una foto, elimina la anterior
        if ($userProfile->photo) {
            Storage::delete('public/images/' . $userProfile->photo);
        }

        // Sube la nueva foto
        $fileName = time().'.'.$request->photo->extension();
        $request->photo->storeAs('public/images', $fileName);

        // Actualiza el campo 'photo' en la base de datos
        $userProfile->photo = $fileName;
    }

    $userProfile->bio = $request->bio;
    $userProfile->birthdate = $request->birthdate;
    $userProfile->gender = $request->gender;
    $userProfile->contact_email = $request->contact_email;
    $userProfile->contact_number = $request->contact_number;

    $userProfile->save();

    Log::debug('Perfil de usuario después de la actualización: ', ['userProfile' => $userProfile]);

    return redirect()->route('user-profile.showOwn');
}

public function showOwnProfile()
{
    $userId = Auth::id();
    $userProfile = UserProfile::where('user_id', $userId)->first();

    return view('pages.user-profile', compact('userProfile'));
}

public function showOtherUserProfile(User $user)
{
    $userProfile = UserProfile::where('user_id', $user->id)->first();

    if (!$userProfile) {
        return redirect()->route('home.index');
    }

    return view('pages.user-profile-show', compact('userProfile'));
}



    public function destroy($id): RedirectResponse
{
    // Encuentra el perfil del usuario por su id
    $userProfile = UserProfile::findOrFail($id);

    // Comprueba si el usuario autenticado es el dueño del perfil
    if(Auth::user()->id !== $userProfile->user_id){
        return back();
    }

    // Elimina la foto del perfil si existe
    if ($userProfile->photo) {
        Storage::delete('public/images/' . $userProfile->photo);
    }

    // Establece los datos del perfil a null
    $userProfile->bio = null;
    $userProfile->birthdate = null;
    $userProfile->gender = null;
    $userProfile->photo = null;
    $userProfile->contact_email = null;
    $userProfile->contact_number = null;


    $userProfile->save();

    return back();
}

}

