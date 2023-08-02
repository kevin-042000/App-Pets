<?php

namespace App\Http\Controllers;

use Livewire\Livewire;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\LostPetComment; 
use App\Models\FoundPetComment;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    // public function storeLostPetComment(CommentRequest $request, $lost_pet_id)
    // {
    //     $comment = new LostPetComment; 
    //     $comment->body = $request->body;
    //     $comment->user_id = Auth::id();
    //     $comment->lost_pet_id = $lost_pet_id;
    //     $comment->save();

    //       // Emitir un evento de Livewire para actualizar el recuento de comentarios
    //       $this->emit('commentAdded');
        
    //     return redirect()->route('lost-pets.index'); 
    // }

    public function storeLostPetComment(CommentRequest $request, $lost_pet_id)
{
    $comment = new LostPetComment; 
    $comment->body = $request->body;
    $comment->user_id = Auth::id();
    $comment->lost_pet_id = $lost_pet_id;
    $comment->save();

    // Emitir un evento de Livewire para actualizar el recuento de comentarios
    Livewire::dispatch('commentAdded');

    return redirect()->route('lost-pets.index'); 
}

    
    public function storeFoundPetComment(CommentRequest $request, $found_pet_id)
    {
        $comment = new FoundPetComment;
        $comment->body = $request->body;
        $comment->user_id = Auth::id();
        $comment->found_pet_id = $found_pet_id;
        $comment->save();

         
    
        return redirect()->route('found-pets.index');
    }

    public function destroy($type, $id)
    {
        // Identificamos si viene de FoundPet o LostPet
        if ($type === 'found') {
            $comment = FoundPetComment::findOrFail($id);
        } else {
            $comment = LostPetComment::findOrFail($id);
        }

        // Verificamos si el usuario autenticado es el dueño del comentario
        if (auth()->user()->id === $comment->user_id) {
            $comment->delete();
        }


        return redirect()->back();
    }
}
