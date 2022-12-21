<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Basket;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function sent(Basket $basket){
        $basket->update([
            'status' => 'sent'
        ]);

        return back()->with('message', __('messages.sent'));
    }

    public function basket(){
        $foodsInBasket = Basket::where('status', 'received')->with(['food', 'user'])->get();
        return view('adm.basket', ['foodsInBasket' => $foodsInBasket]);
    }

    public function index(Request $request){
//        $this->authorize('viewAny', User::class);
        $users = null;
        if($request->search){
            $users = User::where('name', 'LIKE', '%'.$request->search.'%')->
            orWhere('email', 'LIKE', '%'.$request->search.'%')
                ->with('role')->get();
        }
        else{
            $users = User::with('role')->get();
        }
        return view('adm.users', ['users' => $users, 'roles' => Role::all()]);
    }

    public function ban(User $user){
        $user->update([
            'is_active' => false,
        ]);
        return back()->with('message', __('messages.bban'));
    }

    public function unban(User $user){
        $user->update([
            'is_active' => true,
        ]);
        return back()->with('message', __('messages.uun'));
    }

    public function update(Request $request, User $user) {
        $user->update([
            'role_id' => $request->role_id,
        ]);

        return redirect()->route('adm.users.index', [$user->role_id]);
    }
}
