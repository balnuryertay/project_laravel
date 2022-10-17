<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Feedback;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
    public function foodsByCategory(Category $category){
        return view('foods.index', ['food' => $category->foods, 'categories' => Category::all()]);
    }

    public function category(Category $category){
        return view('category', ['food' => $category->foods,'categories' => Category::all()]);
    }

    public function index() {
        $allFoods = Food::all();
        return view('foods.index', ['food' => $allFoods, 'categories' => Category::all()]);
    }

    public function create() {
        return view('foods.create', ['categories' => Category::all()]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'composition' => 'required',
            'price' => 'required',
            'img' => 'required',
            'category_id' => 'required|numeric|exists:categories,id'
    ]);

    Auth::user()->foods()->create($validated);
    return redirect()->route('foods.index', ['categories' => Category::all()])->with('message', 'Food added the menu!');
    }

    public function show(Food $food) {
        $feedbacks = $food->feedbacks;
        return view('foods.show', ['food' => $food,'categories' => Category::all(), 'feedbacks' =>$feedbacks]);
    }

    public function edit(Food $food) {
        return view('foods.edit', ['food' => $food, 'categories' => Category::all()]);
    }

    public function update(Request $request, Food $food) {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'composition' => 'required',
            'price' => 'required',
            'img' => 'required',
            'category_id' => 'required|numeric|exists:categories,id'
    ]);

    Auth::user()->foods()->update($validated);
    return redirect()->route('foods.index')->with('message', 'Menu is updated!');
    }

    public function destroy(Food $food) {
        $food->delete();
        return redirect()->route('foods.index')->with('message', 'Food is deleted from the menu!');
    }
}
