<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        return view('auth.profile',['categories' => Category::all()]);
    }

    public function edit(User $user) {
        return view('auth.edit', ['user'=>$user]);
    }

    public function update(Request $request,User $user){
        $validated=$request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|max:255',
            'img'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
        ]);

        $fileName = time().$request->file('img')->getClientOriginalName();
        $image_path=$request->file('img')->storeAs('users',$fileName,'public');

        Auth::user()->update([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>Hash::make($request->input('password')),
            'img'=>'/storage/'.$image_path,
        ]);

        return redirect()->route('adm.users.index', [$user->id])->with('message', __('messages.added'));
    }
}
