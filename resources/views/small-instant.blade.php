<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>
    <div id="my-app">
        <section class="pt-5 pb-5">
            <div class="container">
                <instant-search></instant-search>
            </div>
        </section>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>