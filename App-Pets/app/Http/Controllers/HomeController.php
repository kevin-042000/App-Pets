<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\view;
use App\Models\LostPet;
use App\Models\FoundPet;

class HomeController extends Controller
{
    public function index(): view
    {
        $LostPets = LostPet::latest()->get();
        $FoundPets = FoundPet::latest()->get();

        // Combinar las colecciones de Lost Pets y Found Pets en una sola
        $AllPets = $LostPets->toBase()->merge($FoundPets);

        // Ordenar la colección combinada por la fecha más reciente
        $SortedPets = $AllPets->sortByDesc('created_at');

        // Verifica si la colección está vacía
        if ($SortedPets->isEmpty()) {
            $message = 'No hay publicaciones de mascotas en este momento.';
        } else {
            $message = null; // Si hay publicaciones, establece el mensaje a null
        }

        return view('pages.home', compact('SortedPets', 'message'));
}
}
