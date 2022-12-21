<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index(){
        return view('adm.feedback', ['feedbacks'=>Feedback::all()]);
    }

    public function destroy(Feedback $feedback){
        $feedback->delete();
        return redirect()->route('adm.feedbacks.index')->with('message', __('messages.feeddelete'));
    }

}
