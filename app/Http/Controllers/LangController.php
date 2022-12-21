<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function PHPUnit\Framework\exactly;

class LangController extends Controller
{
    public function switchlang(Request $request, $lang){
        if(array_key_exists($lang, config('app.languages'))){
            $request->session()->put('mylocale', $lang);
        }
        return back();
    }
}
