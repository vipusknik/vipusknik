<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/img/vipusknik_32x32.ico">
    <meta name="keywords" content="Выпускник, Vipusknik, абитуриент, колледж, вуз, университет, Казахстан">
    <meta name="description" content="Выпускник - информационно-обучающий портал для абитуриентов Казахстана.
        У нас Вы сможете посмотреть информацию о всех высших и средне-специальных учебных заведениях страны, узнать о
        специальностях и профессиях, подготовится к ЕНТ, быть в курсе новостей мира образования и много другое.">
    {{-- <link rel="icon" type="image/png" href="/images/icons/walker.png"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @yield('title') | {{ config('app.name') }}
    </title>
    <link href="https://fonts.googleapis.com/css?family=Cuprum" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @yield ('styles')
</head>
<body class="font-cuprum">
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <div id="app" v-cloak>
        @yield ('content')

        {{-- Кнопка наверх --}}
        <jump-up-button :always-visible="true" class="hidden lg:flex lg:flex-col lg:items-center lg:pin-l lg:pin-b lg:ml-10 lg:mb-10 cursor-pointer">
            <button class="w-8 h-8 rounded-sm bg-orange mb-2">
                <svg class="w-4 h-4 fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M8 3L0 13h16z"/></svg>
            </button>
            <div class="text-orange select-none">Наверх</div>
        </jump-up-button>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
