<?php

namespace App\Policies;

use App\Models\Like;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class LikePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Like $like): bool
    {
         // Permite que cualquier usuario autenticado pueda crear un "like".
         return $user != null;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true; // Todos los usuarios autenticados pueden crear likes

    }

    /**
     * Determine whether the user can update the model.
     */
public function update(User $user, Like $like): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Like $like): bool
    {
        // Permite que un usuario pueda eliminar un "like" solo si él es quien lo creó.
        return $user->id === $like->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */    
    public function restore(User $user, Like $like): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Like $like): bool
    {
        //
    }
}
