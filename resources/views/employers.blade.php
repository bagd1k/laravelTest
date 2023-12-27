<!doctype html>

<html>

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">



    <title>Employers</title>

    <link rel="stylesheet" href="https://unpkg.com/tachyons@4.10.0/css/tachyons.min.css"/>

</head>

<body>

<div class="mw6 center pa3 sans-serif">

    <h1 class="mb4">Employers</h1>



    @foreach($employers as $employer)

        <div class="pa2 mb3 striped--near-white">

            <header class="b mb2">{{ $employer->name }}</header>

            <div class="pl2">

                <p class="mb2">id: {{ $employer->id }}</p>

                <p class="mb2">Job Title: {{ $employer->position }}</p>

                <p class="mb2">Salary: {{ $employer->salary }}</p>

            </div>

        </div>

    @endforeach

</div>

</body>

</html>
