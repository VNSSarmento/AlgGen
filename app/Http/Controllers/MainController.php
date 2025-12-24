<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    public function home(): View
    {
        return view('home');
    }

    public function generateExercises(Request $request)
    {

        $validated = $request->validate([
            'sum' => 'required_without_all:sub,mult,div',
            'sub' => 'required_without_all:sum,mult,div',
            'mult' => 'required_without_all:sub,sum,div',
            'div' => 'required_without_all:sub,mult,sum',
            'questions' => 'integer|min:1|max:100',
            'difficulty' => 'required|in:easy,medium,hard,extreme'
        ]);

        $operations = [];
        if ($request->sum) $operations[] = 'sum';
        if ($request->sub) $operations[] = 'sub';
        if ($request->mult) $operations[] = 'mult';
        if ($request->div) $operations[] = 'div';

        $questions = $request->questions;

        $exercises = [];

        for ($index = 1; $index <= $questions; $index++) {
            $operation = $operations[array_rand($operations)];
            $number1 = 0;
            $number2 = 0;
            $numberRand = rand(1, 999);

            [$number1, $number2] = match ($request->difficulty) {
                'easy' => [rand(1, 101), rand(1, 101)],
                'medium' => [rand(50, 201), rand(50, 201)],
                'hard' => [rand(50, 500), rand(100, 500)],
                'extreme' => [rand(50, 999), rand(100, 999)],
            };

            $exercise = $this->buildExercise($operation, $request->difficulty, $number1, $number2, $numberRand);
            $exercises[] = [
                'exercise_number' => $index,
                'exercise' => $exercise['expression'],
                'sollution' => $exercise['result']
            ];
        }

        dd($exercises);
    }

    public function buildExercise($operation, $difficulty, $num1, $num2, $numRand)
    {
        $operators = ['sum' => '+', 'sub' => '-', 'mult' => '*', 'div' => '/'];
        $op = $operators[$operation];

        $expression = match ($difficulty) {
            'easy' => "$num1 $op $num2 = ",
            'medium', 'hard' => "$num1 $op $num2 $op $numRand = ",
            'extreme' => "$num1 $op $num2 $op $numRand $op $numRand $op $numRand = ",
        };

        $result = match ($difficulty) {
            'easy' => match ($operation) {
                'sum' => $num1 + $num2,
                'sub' => $num1 - $num2,
                'mult' => $num1 * $num2,
                'div' => $num1 / $num2,
            },
            'medium', 'hard' => match ($operation) {
                'sum' => $num1 + $num2 + $numRand,
                'sub' => $num1 - $num2 - $numRand,
                'mult' => $num1 * $num2 * $numRand,
                'div' => $num1 / $num2 / $numRand,
            },
            'extreme' => match ($operation) {
                'sum' => $num1 + $num2 + $numRand + $numRand + $numRand,
                'sub' => $num1 - $num2 - $numRand - $numRand - $numRand,
                'mult' => $num1 * $num2 * $numRand * $numRand * $numRand,
                'div' => $num1 / $num2 / $numRand / $numRand / $numRand,
            },
        };

        return ['expression' => $expression, 'result' => $result];
    }

    public function showExercises() {}

    public function exportExercises() {}
}
