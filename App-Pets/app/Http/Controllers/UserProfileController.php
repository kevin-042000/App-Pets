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

class UserProfileController extends Controller
{
//     public function index()
// {
//     $user = Auth::user();
//     return view('pages.user-profile', compact('user'));
// }

public function store(UserProfileRequest $request): RedirectResponse
{
    $user = Auth::user(); // Obtiene el usuario autenticado
    $fileName = null;

    // Comprueba si se ha subido un archivo
    if ($request->hasFile('photo')) {
        $fileName = time().'.'.$request->photo->extension(); // crea un nombre unico para la foto basandose en el momento de la subida
        $request->photo->storeAs('public/images', $fileName); // crea una carpeta en el storage y la guarda
    }

    // Encuentra el perfil del usuario existente o crea uno nuevo si no existe
    $userProfile = UserProfile::firstOrNew(['user_id' => $user->id]);

    $userProfile->bio = $request->bio;
    $userProfile->gender = $request->gender;
    $userProfile->birthdate = $request->birthdate;
    $userProfile->photo = $fileName;

    $userProfile->save();

    return redirect()->route('user-profile.showOwnProfile');
}


    public function edit(UserProfile $user)
    {
            return view('formularios.form-edit-user-profile', compact('user'));
    }
    


    public function update(UserProfileRequest $request, $id): RedirectResponse
{
    $userProfile = UserProfile::findOrFail($id);
    
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
    
    $userProfile->save();

    return redirect()->route('user-profile.showOwnProfile');
}


// public function show(User $user)
// {
//     // Obtener el perfil del usuario por su id
//     $userProfile = UserProfile::where('user_id', $user->id)->first();

//     // Si no existe el perfil, redirigir a una página de error o a donde prefieras
//     if (!$userProfile) {
//         return redirect()->route('home.index');
//     }

//     // Si el usuario autenticado es el mismo que el del perfil o no
//     $isSameUser = Auth::user() ? Auth::user()->id == $user->id : false;

//     // Si es el mismo, redirigir al perfil del usuario, si no, redirigir a la vista del perfil del otro usuario
//     $viewName = $isSameUser ? 'pages.user-profile' : 'pages.user-profile-show';

//     return view($viewName, compact('userProfile'));
// }

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

    $userProfile->save();

    return back();
}

}

