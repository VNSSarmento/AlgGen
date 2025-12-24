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

    }

    public function showExercises(){

    }

    public function exportExercises(){

    }
}
