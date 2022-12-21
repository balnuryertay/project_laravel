<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function index(){
        if(Auth::user())
            $basket = Basket::where('status', 'ordered')->with(['food'])->get();
        return view('basket.index', ['basket' => $basket, 'food' => Food::all(), 'categories' => Category::all()]);
    }

    public function buy(){
        $ids = Auth::user()->foodsWithStatus('ordered')->allRelatedIds();

        foreach ($ids as $id){
            Auth::user()->foodsWithStatus('ordered')->updateExistingPivot($id, ['status' => 'received']);
        }
        return back()->with('message', __('messages.buy'));
    }

    public function basketAdd(Request $request, Food $food) {
        $basket = Auth::user()->foodsWithStatus('ordered')->where('food_id', $food->id)->first();

        if($basket != null)
            Auth::user()->foodsWithStatus('ordered')->updateExistingPivot($food->id,
            ['number' => $basket->pivot->number+$request->input('number')]);
        else
            Auth::user()->foodsWithStatus('ordered')->attach($food->id,
            ['number' => $request->input('number')]);

        return redirect()->route('basket.index')->with('message', __('messages.badd'));
    }

    public function basketDelete(Food $food){
        $foodsBought = Auth::user()->foodsWithStatus('ordered')->where('food_id', $food->id)->first();

        if($foodsBought != null)
            Auth::user()->foodsWithStatus('ordered')->detach($food->id);

        return back()->with('message', __('messages.bdelete'));
    }
}
