<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Http\Requests\FoundPetRequest;
use App\Models\FoundPet;
use Illuminate\View\view;
use Illuminate\http\RedirectResponse;

class FoundPetController extends Controller
{
    public function index(): view
    {
        $FoundPets = FoundPet::all();
        return view('pages.found-pets', compact('FoundPets'));
    }

    public function store(FoundPetRequest $request): RedirectResponse
    {
        FoundPet::create([
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'date_lost' => $request->date_lost
        ]);        
        return redirect()->route('lost-pets.index');
    }

    public function edit(FoundPet $pet): View
    {
        return view('function.edit', compact('pet'));       
    }

    public function update(FoundPetRequest $request, FoundPet $pet): RedirectResponse
    {
        $pet->update($request->all());
        return redirect()->route('found-pets.index');
    }

    public function destroy(FoundPet $pet): RedirectResponse
    {
    $pet->delete();
    return redirect()->route('found-pets.index');
    }
}
 

