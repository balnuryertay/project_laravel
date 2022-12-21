<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Feedback;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{

    public function index() {
        //
    }

    public function create() {
        return view('feedbacks.create', ['food' => Food::all()]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'text' => 'required',
            'food_id'=>'required|numeric|exists:food,id'
        ]);
        Auth::user()->feedbacks()->create($validated);
        return back()->with('message', __('messages.fadd'));
    }

    public function show(Feedback $feedback) {
        //
    }

    public function edit(Feedback $feedback) {
        return view('feedbacks.edit', ['feedback'=>$feedback]);
    }

    public function update(Request $request, Feedback $feedback) {
        $validated = $request->validate([
            'text' => 'required',
        ]);

        Auth::user()->feedbacks()->update($validated);
        return redirect()->route('foods.show', $feedback->food_id)->with('message', __('messages.fupdate'));
    }

    public function destroy(Feedback $feedback) {
        $feedback->delete();
        return back()->with('message', __('messages.fdelete'));
    }
}

