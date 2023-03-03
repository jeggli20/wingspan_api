<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Jacob Eggli" />
    <meta name="description" content="A data API for the Wingspan board game. All information is received from the Wingspan board game" />
    <title>Wingspan API {{ str_contains(url()->current(), "admin") ? "- Admin" : "" }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&family=Barlow+Condensed&display=swap" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
</head>
@include("partials.header")
<body>
    <main class="container">
        @yield("content")
    </main>
</body>
</html>