<?php

namespace App\Http\Controllers\Auth2;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterControllerr extends Controller
{
    public function create(){
        return view('auth.register');
    }
    public function register(Request $request){
        $validated = $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|max:255|unique:users',
            'password'=>'required|numeric',
            'img'=>'required|image|mimes:jpg, png, jpeg, gif, svg|max:2048',
        ]);

        $fileName = time().$request->file('img')->getClientOriginalName();
        $image_path = $request->file('img')->storeAs('users', $fileName, 'public');

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id' => Role::where('name', 'user')->first()->id,
            'img' => '/storage/'.$image_path,
        ]);

        Auth::login($user);

        return redirect()->route('home')->with('message', __('messages.rrr'));
    }

    public function edit(User $user) {
        return view('auth.edit',['user'=>$user]);
    }

    public function update(Request $request,User $user){
        $validated=$request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|max:255',
            'img'=>'image',
        ]);
        $image_path=$request->img;

        if($request->img!= null){
            $fileName = time().$request->file('img')->getClientOriginalName();
            $image_path=$request->file('img')->storeAs('users',$fileName,'public');
        }

        Auth::user()->update([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'img'=>'/storage/'.$image_path,
        ]);

        return redirect()->route('adm.users.index',[$user->id])->with('message',__('messages.profile'));
    }

    public function balance(User $user) {
        return view('auth.balance', ['users'=>$user, 'categories' => Category::all()]);
    }

    public function addBalance(Request $request, User $user) {
        Auth::user()->update([
            'payment'=>Auth::user()->payment+$request->input('payment'),
        ]);

        Auth::user();
        return redirect()->route('users.balance', [$user->id])->with('message',__('messages.balanceUpdate'));
    }

}
