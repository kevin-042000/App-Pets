<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\LostPetComment;
use App\Models\FoundPetComment;

class CommentsComponent extends Component
{
    public $commentsCount;
    public $modelId;
    public $modelType;

    public function mount($modelId, $modelType)
    {
        $this->modelId = $modelId;
        $this->modelType = $modelType;
    }

    public function getCommentsCount()
    {
        if ($this->modelType == 'lost-pet') {
            return LostPetComment::where('lost_pet_id', $this->modelId)->count();
        }
        elseif ($this->modelType == 'found-pet') {
            return FoundPetComment::where('found_pet_id', $this->modelId)->count();
        }
        else {
            return 0;
        }
    }

    public function render()
    {
        $this->commentsCount = $this->getCommentsCount();
        return view('livewire.comments-component', ['commentsCount' => $this->commentsCount]);
    }
}


    // public $modelId;
    // public $modelType;
    // public $showComments = false;

    // public function mount($modelId, $modelType)
    // {
    //     $this->modelId = $modelId;
    //     $this->modelType = $modelType;
    // }

    // public function getModel()
    // {
    //     if ($this->modelType == 'lost-pet') {
    //         return LostPet::find($this->modelId);
    //     } elseif ($this->modelType == 'found-pet') {
    //         return FoundPet::find($this->modelId);
    //     } else {
    //         return null; // Devuelve null si el tipo de modelo no se reconoce
    //     }
    // }

    // public function toggle()
    // {
    //     $this->showComments = !$this->showComments;
    //     $this->emit('toggleComments', $this->showComments);
    // }

    // public function render()
    // {
    //     $model = $this->getModel();
    //     return view('livewire.comments-component', [
    //         'commentsCount' => $model->comments->count(),
    //         'showComments' => $this->showComments
    //     ]);
    // }
