<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/images/icons/walker.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @yield('title') | {{ config('app.name') }}
    </title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <!--  -->

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
