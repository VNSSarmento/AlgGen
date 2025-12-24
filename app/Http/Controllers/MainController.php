<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    public function home():View{
        return view('home');
    }

    public function generateExercises(Request $request){

        $validated = $request->validate([
            'sum' => 'required_without_all:sub,mult,div',
            'sub' => 'required_without_all:sum,mult,div',
            'mult' => 'required_without_all:sub,sum,div',
            'div' => 'required_without_all:sub,mult,sum',
            'question' => 'int',
            'difficulty' => 'required'
        ]);

        dd($request->all());

    }

    public function showExercises(){

    }

    public function exportExercises(){

    }
}
