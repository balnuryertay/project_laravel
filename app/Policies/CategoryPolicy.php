<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        return ($user->role->name == 'admin' || $user->role->name == 'moderator');
    }


    public function view(User $user, Category $category)
    {
        //
    }


    public function create(User $user)
    {
        return ($user->role->name == 'admin' || $user->role->name == 'moderator');
    }


    public function update(User $user, Category $category)
    {
        //
    }


    public function delete(User $user, Category $category)
    {
        return ($user->role->name == 'moderator' || $user->role->name == 'admin');
    }


    public function restore(User $user, Category $category)
    {
        //
    }


    public function forceDelete(User $user, Category $category)
    {
        //
    }
}
