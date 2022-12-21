<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
    public function index(Request $request){
        $foods = null;
        if($request->search){
            $foods = Food::where('name', 'LIKE', '%'.$request->search.'%')->
            orWhere('food->category->name', 'LIKE', '%'.$request->search.'%')
                ->with('category')->get();
        }
        else{
            $foods = Food::with('category')->get();
        }
        return view('adm.foods', ['food' => $foods, 'categories' => Category::all()]);
    }

    public function create() {
        $this->authorize('create', Food::class);
        return view('adm.createf', ['categories' => Category::all()]);
    }

    public function store(Request $request) {
        $this->authorize('create', Food::class);
        $validated = $request->validate([
            'name_kz' => 'required|max:255',
            'name_ru' => 'required|max:255',
            'name_en' => 'required|max:255',
            'composition_kz' => 'required',
            'composition_ru' => 'required',
            'composition_en' => 'required',
            'price' => 'required',
            'img' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'category_id' => 'required|numeric|exists:categories,id'
        ]);

        $fileName = time().$request->file('img')->getClientOriginalName();
        $image_path = $request->file('img')->storeAs('foods', $fileName, 'public');
        $validated['img'] = '/storage/'.$image_path;

        Auth::user()->foods()->create($validated);
        return redirect()->route('adm.foods.index', ['categories' => Category::all()])->with('message', __('messages.added') );
    }

    public function edit(Food $food) {
        return view('adm.edit', ['food' => $food, 'categories' => Category::all()]);
    }

    public function update(Request $request, Food $food) {
        $fileName = time().$request->file('img')->getClientOriginalName();
        $image_path = $request->file('img')->storeAs('foods', $fileName, 'public');

        $food->update([
            'name_kz' => $request->input('name_kz'),
            'name_ru' => $request->input('name_ru'),
            'name_en' => $request->input('name_en'),
            'composition_kz' => $request->input('composition_kz'),
            'composition_ru' => $request->input('composition_ru'),
            'composition_en' => $request->input('composition_en'),
            'price'=>$request->input('price'),
            'category_id'=>$request->input('category_id'),
            'img' => '/storage/'.$image_path,
        ]);

        Auth::user();
        return redirect()->route('adm.foods.index', ['food' => $food->id])->with('message', __('messages.updated') );
    }

    public function destroy(Food $food) {
        $this->authorize('delete', $food);
        $food->delete();
        return redirect()->route('adm.foods.index')->with('message', __('messages.deleted') );
    }
}
