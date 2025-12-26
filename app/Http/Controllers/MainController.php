<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    public function home(): View
    {
        $exercises = session('exercises', []);
        return view('home', compact('exercises'));
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

        $numberQuestions = $request->questions;

        $exercises = [];

        for ($index = 1; $index <= $numberQuestions; $index++) {
            $operation = $operations[array_rand($operations)];
            $number1 = 0;
            $number2 = 0;
            $numberRand1 = rand(1, 999);
            $numberRand2 = rand(1, 999);
            $numberRand3 = rand(1, 999);

            [$number1, $number2] = match ($request->difficulty) {
                'easy' => [rand(1, 101), rand(1, 101)],
                'medium' => [rand(50, 201), rand(50, 201)],
                'hard' => [rand(50, 500), rand(100, 500)],
                'extreme' => [rand(1, 999), rand(100, 999)],
            };

            $exercise = $this->buildExercise($operation, $request->difficulty, $number1, $number2, $numberRand1, $numberRand2, $numberRand3);
            $exercises[] = [
                'exercise_number' => $index,
                'questions' => $exercise['expression'],
                'sollution' => $exercise['result']
            ];
        }

        session()->put('exercises', $exercises);

        return redirect()->route('home');
    }

    private function buildExercise($operation, $difficulty, $num1, $num2, $numRand1, $numRand2, $numRand3): array
    {
        $operators = ['sum' => '+', 'sub' => '-', 'mult' => '*', 'div' => '/'];
        $op = $operators[$operation];
        $expression = match ($difficulty) {
            'easy' => "$num1 $op $num2",
            'medium', 'hard' => "$num1 $op $num2 $op $numRand1",
            'extreme' => "$num1 $op $num2 $op $numRand1 $op $numRand2 $op $numRand3",
        };

        $result = match ($difficulty) {
            'easy' => match ($operation) {
                'sum' => $num1 + $num2,
                'sub' => $num1 - $num2,
                'mult' => $num1 * $num2,
                'div' => $num1 / $num2,
            },
            'medium', 'hard' => match ($operation) {
                'sum' => $num1 + $num2 + $numRand1,
                'sub' => $num1 - $num2 - $numRand1,
                'mult' => $num1 * $num2 * $numRand1,
                'div' => $num1 / $num2 / $numRand1,
            },
            'extreme' => match ($operation) {
                'sum' => $num1 + $num2 + $numRand1 + $numRand2 + $numRand3,
                'sub' => $num1 - $num2 - $numRand1 - $numRand2 - $numRand3,
                'mult' => $num1 * $num2 * $numRand1 * $numRand2 * $numRand3,
                'div' => $num1 / $num2 / $numRand1 / $numRand2 / $numRand3,
            },
        };

        return ['expression' => $expression, 'result' => round($result, 2)];
    }

    public function exportExercises()
    {
        if (!session()->has('exercises')) {
            return redirect()->route('home');
        };

        $exercices = session('exercises');

        $filename = 'exercices_' . env('APP_NAME') . '_' . date('YmdHis') . '.txt';

        $content = '';

        foreach ($exercices as $exercice) {
            $content .= $exercice['exercise_number'] . ' : ' . $exercice['questions'] . "\n";
        }

        $content .= "\n";

        $content .= "Soluções\n" . str_repeat('-', 20) . "\n";
        foreach ($exercices as $exercice) {
            $content .= $exercice['exercise_number'] . ' : ' . $exercice['sollution'] . "\n";
        }

        return response($content)
            ->header('Content-Type', 'text/plain')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }

    public function exportExercisesPDF()
    {
        if (!session()->has('exercises')) {
            return redirect()->route('home');
        };

        $exercises = session('exercises');

        $filename = 'exercises_' . env('APP_NAME') . '_' . now()->format('YmdHis') . '.pdf';

        $pdf = Pdf::loadView('pdf.exercises', [
            'exercises' => $exercises
        ]);

        return $pdf->download($filename);
    }
}
