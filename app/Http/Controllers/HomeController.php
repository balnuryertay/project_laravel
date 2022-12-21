<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $allFoods = Food::all();
        return view('home', ['food' => $allFoods, 'categories' => Category::all()]);
    }
}
