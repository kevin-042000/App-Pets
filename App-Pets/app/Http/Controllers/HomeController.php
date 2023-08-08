<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\view;
use Illuminate\Support\Facades\Log; 
use App\Models\LostPet;
use App\Models\FoundPet;
use App\Models\LostPetComment; 
use App\Models\FoundPetComment;
use Illuminate\Support\Facades\Auth;
 
class HomeController extends Controller
{
    public function index(): view
    {
        $LostPets = LostPet::with('lostPetComments')->latest()->get();
        $FoundPets = FoundPet::with('foundPetComments')->latest()->get();
       
         


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

