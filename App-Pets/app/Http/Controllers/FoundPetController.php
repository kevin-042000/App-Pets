<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FoundPetRequest;
use App\Models\FoundPet;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\FoundPetComment; 

class FoundPetController extends Controller
{
    public function index(): View
    { 
        $FoundPets = FoundPet::with('foundPetComments')->latest()->get();
        $type = 'found';
        return view('pages.found-pets', compact('FoundPets', 'type'));
    }

    public function store(FoundPetRequest $request): RedirectResponse
    {
        $user = Auth::user(); // Obtiene el usuario autenticado
        $fileName = null;
    
        // Comprueba si se ha subido un archivo
        if ($request->hasFile('photo')) {
            $fileName = time().'.'.$request->photo->extension(); // crea un nombre unico para la foto basandose en el momento de la subida
            $request->photo->storeAs('public/images', $fileName); // crea una carpeta en el storage y la guarda
        }
        
        FoundPet::create([
            'user_id' => $user->id, // Asigna el user_id del usuario autenticado
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'date_found' => $request->date_found,
            'photo' => $fileName
     
        ]);        
        return redirect()->route('found-pets.index');
    }

    public function edit(FoundPet $pet): View
    {
        return view('Formularios.form-edit-found-pets', compact('pet'));       
    }

    
    public function update(FoundPetRequest $request, $id): RedirectResponse
    {
        // Encuentra la mascota por su id
        $pet = FoundPet::find($id);
    
        // Comprueba si se ha subido un archivo
        if ($request->hasFile('photo')) {
            // Si ya hay una foto, la elimina
            if ($pet->photo) {
                Storage::delete('public/images/' . $pet->photo);
            }
    
            // Sube la nueva foto
            $fileName = time().'.'.$request->photo->extension();
            $request->photo->storeAs('public/images', $fileName);
    
            // Actualiza el campo 'photo' en la base de datos
            $pet->photo = $fileName;
        }
    
        // Actualiza los otros campos
        $pet->title = $request->title;
        $pet->description = $request->description;
        $pet->location = $request->location;
        $pet->date_found = $request->date_found;
        
        // Guarda los cambios
        $pet->save();
    
        return redirect()->route('found-pets.index');
    }
    

    public function destroy(FoundPet $pet): RedirectResponse
    {
     // Verificar si el usuario autenticado es el dueño de la publicación
     if (Auth::user()->id == $pet->user_id) {
        // Eliminar la imagen si existe
        if ($pet->photo) {
            Storage::delete('public/images/' . $pet->photo);
        }

        // Eliminar la publicación
        $pet->delete();

        return back();
    }
    // Si el usuario no tiene permiso para eliminar la publicación regresa a la pagina anterior
    return back();
}

}

    

 

