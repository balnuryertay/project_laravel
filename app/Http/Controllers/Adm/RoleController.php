<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        return view('adm.role', ['roles'=>Role::all()]);
    }

    public function create(){
        $this->authorize('create', Role::class);
        return view('adm.createee');
    }

    public function store(Request $request){
        $this->authorize('create', Role::class);
        Role::create([
            'name'=>$request->input('name'),
        ]);
        return redirect()->route('adm.roles.index')->with('message', __('messages.roleadd'));
    }

    public function destroy(Role $role){
        $this->authorize('delete', $role);
        $role->delete();
        return redirect()->route('adm.roles.index')->with('message', __('messages.roledelete'));
    }
}
