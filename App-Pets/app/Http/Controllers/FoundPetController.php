<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FoundPetRequest;
use App\Models\FoundPet;
use Illuminate\View\view;
use Illuminate\http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
 
class FoundPetController extends Controller
{
    public function index(): view
    {
        $FoundPets = FoundPet::latest()->get();


        return view('pages.found-pets', compact('FoundPets'));
    }

    public function store(FoundPetRequest $request): RedirectResponse
    {

        $user = Auth::user(); // Obtiene el usuario autenticado
        
        FoundPet::create([
            'user_id' => $user->id, // Asigna el user_id del usuario autenticado
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'date_found' => $request->date_found
     
        ]);        
        return redirect()->route('found-pets.index');
    }

    public function edit(FoundPet $pet): View
    {
        return view('Formularios.form-edit-found-pets', compact('pet'));       
    }

    public function update(FoundPetRequest $request, FoundPet $pet): RedirectResponse
    {
        $pet->update($request->all());
        return redirect()->route('found-pets.index');
    }

    public function destroy(FoundPet $pet): RedirectResponse
    {
    $pet->delete();
    return back();
    }

    
}
 

