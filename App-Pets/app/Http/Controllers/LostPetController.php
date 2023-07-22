<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LostPetRequest;
use App\Models\LostPet;
use Illuminate\View\view;
use Illuminate\http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Policies\LostPetPolicy;

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

        LostPet::create([
            'user_id' => $user->id, // Asigna el user_id del usuario autenticado
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'date_lost' => $request->date_lost
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
    $pet->delete();
    return back();
    }
}
 