<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('adm.category', ['categories'=>Category::all()]);
    }

    public function create(){
        $this->authorize('create', Category::class);
        return view('adm.create');
    }

    public function store(Request $request){
        $this->authorize('create', Category::class);
        Category::create([
            'name'=>$request->input('name'),
        ]);
        return redirect()->route('adm.categories.index')->with('message', __('messages.catadd'));
    }

    public function destroy(Category $category){
        $this->authorize('delete', $category);
        $category->delete();
        return redirect()->route('adm.categories.index')->with('message', __('messages.catdelete'));
    }

}
