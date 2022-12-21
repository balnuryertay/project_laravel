<?php

namespace App\Policies;

use App\Models\Food;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FoodPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user, Food $food)
    {
        return ($user->role->name == 'moderator' || $user->role->name == 'admin');
    }


    public function create(User $user)
    {
        return ($user->role->name == 'moderator' || $user->role->name == 'admin');
    }


    public function update(User $user, Food $food)
    {
        //
    }


    public function delete(User $user, Food $food)
    {
        return ($user->id == $food->user_id) || ($user->role->name != 'user');
    }


    public function restore(User $user, Food $food)
    {
        //
    }


    public function forceDelete(User $user, Food $food)
    {
        //
    }
}
