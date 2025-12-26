<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: DejaVu Sans; }
        h2 { margin-top: 30px; }
    </style>
</head>
<body>

<h2>Exercícios</h2>
<hr>


@foreach ($exercises as $exercise)
    <p>
        {{ $exercise['exercise_number'] }} :
        {{ $exercise['questions'] }}
    </p>
@endforeach

<hr>
<h2>Soluções</h2>

@foreach ($exercises as $exercise)
    <p>
        {{ $exercise['exercise_number'] }} - Resposta:
        {{ $exercise['sollution'] }}
    </p>
@endforeach

</body>
</html>
