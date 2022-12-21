<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\Food;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
    public function foodsByCategory(Category $category){
        return view('foods.index', ['food' => $category->foods, 'categories' => Category::all()]);
    }

    public function courier(){
        $foodsInBasket = Basket::where('status', 'sent')->with(['food', 'user'])->get();
        return view('basket.courier', ['foodsInBasket' => $foodsInBasket, 'categories' => Category::all()]);
    }

    public function delivered(Basket $basket){
        $basket->update([
            'status' => 'delivered'
        ]);

        return back()->with('message', __('messages.ddd') );
    }

//    public function likes() {
//        $foodsLiked = Food::find(1);
//        return view('foods.like', ['foodsLiked' => $foodsLiked, 'categories' => Category::all()]);
//    }

    public function like(Food $food){
        Auth::user()->foodsLiked()->attach($food->id);
        return back()->with('message', __('messages.like') );
    }

    public function unlike(Food $food){
        $foodLiked = Auth::user()->foodsLiked()->where('food_id', $food->id)->first();

        if($foodLiked != null){
            Auth::user()->foodsLiked()->detach($food->id);
        }

        return back()->with('message', __('messages.unlike') );
    }

    public function index() {
        $allFoods = Food::all();
        return view('foods.index', ['food' => $allFoods, 'categories' => Category::all()]);
    }

    public function create() {
        $this->authorize('create', Food::class);
        return view('foods.create', ['categories' => Category::all()]);
    }

    public function store(Request $request) {
        $this->authorize('create', Food::class);
        $validated = $request->validate([
            'name' => 'required|max:255',
            'name_kz' => 'required|max:255',
            'name_ru' => 'required|max:255',
            'name_en' => 'required|max:255',
            'composition_kz' => 'required',
            'composition' => 'required',
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
        return redirect()->route('foods.index', ['categories' => Category::all()])->with('message', __('messages.added') );
    }

    public function show(Food $food) {
        return view('foods.show', ['food' => $food,'categories' => Category::all()]);
    }

    public function edit(Food $food) {
        return view('foods.edit', ['food' => $food, 'categories' => Category::all()]);
    }

    public function update(Request $request, Food $food) {
        $fileName = time().$request->file('img')->getClientOriginalName();
        $image_path = $request->file('img')->storeAs('foods', $fileName, 'public');

        $food->update([
            'name' => $request->input('name'),
            'name_kz' => $request->input('name_kz'),
            'name_ru' => $request->input('name_ru'),
            'name_en' => $request->input('name_en'),
            'composition' => $request->input('composition'),
            'composition_kz' => $request->input('composition_kz'),
            'composition_ru' => $request->input('composition_ru'),
            'composition_en' => $request->input('composition_en'),
            'price'=>$request->input('price'),
            'category_id'=>$request->input('category_id'),
            'img' => '/storage/'.$image_path,
        ]);

        Auth::user();
        return redirect()->route('foods.show', ['food' => $food->id])->with('message', __('messages.updated') );
    }

    public function destroy(Food $food) {
        $this->authorize('delete', $food);
        $food->delete();
        return redirect()->route('foods.index')->with('message', __('messages.deleted') );
    }

}
