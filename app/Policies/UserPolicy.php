<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return ($user->role->name == 'admin');
    }

    public function view(User $user, User $model)
    {
        //
    }

    public function viewOrder(User $user){
        return ($user->role->name == 'courier');

    }

    public function viewCat(User $user){
        return ($user->role->name == 'admin' || $user->role->name == 'moderator');

    }

    public function create(User $user)
    {
        //
    }

    public function update(User $user, User $model)
    {
      //
    }

    public function delete(User $user, User $model)
    {

    }

    public function restore(User $user, User $model)
    {
        //
    }

    public function forceDelete(User $user, User $model)
    {
        //
    }
}
