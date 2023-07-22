<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LostPetRequest;
use App\Models\LostPet;
use Illuminate\View\view;
use Illuminate\http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LostPetController extends Controller
{
    public function index(): view
    {
        $LostPets = LostPet::latest()->get();
        return view('pages.lost-pets', compact('LostPets'));

    }

    public function store(LostPetRequest $request): RedirectResponse
    {
        $user = Auth::user(); // Obtiene el usuario autenticado
        $fileName = null;
    
        // Comprueba si se ha subido un archivo
        if ($request->hasFile('photo')) {
            $fileName = time().'.'.$request->photo->extension(); // crea un nombre unico para la foto basandose en el momento de la subida
            $request->photo->storeAs('public/images', $fileName); // crea una carpeta en el storage y la guarda
        }
    
        LostPet::create([
            'user_id' => $user->id, // Asigna el user_id del usuario autenticado
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'date_lost' => $request->date_lost, 
            'photo' => $fileName
        ]);        
        return redirect()->route('lost-pets.index');
    }
    
    public function edit(LostPet $pet): View
    {
        return view('formularios.form-edit-lost-pets', compact('pet'));       
    }

    public function update(LostPetRequest $request, LostPet $pet): RedirectResponse
    {
        $pet->update($request->all());
        return redirect()->route('lost-pets.index');
    }

    public function destroy(LostPet $pet): RedirectResponse
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
  