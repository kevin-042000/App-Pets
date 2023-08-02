<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Like;
use App\Models\LostPet;
use App\Models\FoundPet;


class LikeButton extends Component
{
    use AuthorizesRequests;

    public $modelId;
    public $modelType;

    public function mount($modelId, $modelType)
    {
        $this->modelId = $modelId;
        $this->modelType = $modelType;
    }

    public function getModel()
    {
        if ($this->modelType == 'lost-pet') {
            return LostPet::find($this->modelId);
        }
        elseif ($this->modelType == 'found-pet') {
            return FoundPet::find($this->modelId);
        }
        else {
            return null; // Devuelve null si el tipo de modelo no se reconoce
        }
    }
    

    public function toggleLike()
{
    $model = $this->getModel();

    // Verificamos si el usuario ya dio like
    $like = $model->likes()->where('user_id', auth()->user()->id)->first();

    if ($like) {
        // Si el usuario ya dio like, lo retiramos
        $this->authorize('delete', $like);  // Cambio aquí
        $like->delete();
    } else {
        // Si el usuario no ha dado like, lo añadimos
        $this->authorize('create', Like::class);

        $like = new Like;
        $like->user_id = auth()->user()->id;

        $model->likes()->save($like);
    }

    $model->load('likes');
}


    public function render()
    {
        $model = $this->getModel();
        return view('livewire.like-button', [
            'isLiked' => $model->likes()->where('user_id', auth()->user()->id)->exists(),
            'likesCount' => $model->likes()->count()
        ]);
    }
}
