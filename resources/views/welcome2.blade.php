@extends ('layouts.base')

@section ('title', 'Цены')

@section ('styles')
    <link rel="stylesheet" href="/css/blueberry.css">
    <script src="sweetalert-master/dist/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="sweetalert-master/dist/sweetalert.css">
@endsection

@section ('content')
    <img src="/img/Vipusknik1.jpg" width="100%">
    <img src="/img/Vipusknik2.jpg" width="100%">
    @endsection
@section('script')
<script src="jquery.blueberry.js"></script>
<script>
    $(window).load(function() {
        $('.blueberry').blueberry();
    });
    document.querySelector('.popup').onclick = function(){
    swal({
    title: "Выберите обязательный предмет",
    text: `
        <a href='/subjects/history'>
            <img src='/img/subjects/history.png' style='margin: 0px 10px;' alt ='ЕНТ обязательные предметы'>
        </a>
        <a href='/subjects/mathematical-literacy'>
            <img src='/img/subjects/mathematical-literacy.png'  style='margin: 0px 10px;' alt ='ЕНТ обязательные предметы'>
        </a>
        <a href='/subjects/grammar-reading'>
            <img src='/img/subjects/grammar-reading.png'  style='margin: 0px 10px;' alt ='ЕНТ обязательные предметы'>
        </a>
    `,
    html: true,
    confirmButtonText: "Назад"
    });
    };
    document.querySelector('.popup1').onclick = function(){
    swal({
    title: "Язык обучения и литература",
    text: `
        </a><a href='/subjects/kazakh-language-and-literature'>
            <img src='/img/subjects/kazakh-language-and-literature.png' alt ='ЕНТ язык обучения'  style='margin: 0px 10px;'>
        </a>
        <a href='/subjects/russian-language-and-literature'>
            <img src='/img/subjects/russian-language-and-literature.png'  style='margin: 0px 10px;' alt ='ЕНТ язык обучения'>
        </a>
    `,
    html: true,
    confirmButtonText: "Назад"
    });
    };
    document.querySelector('.popup2').onclick = function(){
    swal({
    title: "Иностранные языки",
    text: `
        <a href='/subjects/english'>
            <img src='/img/subjects/english.png' style='margin: 0px 10px;' alt ='ЕНТ Английский язык'>
        </a>
        <a href='/subjects/german'>
            <img src='/img/subjects/german.png'  style='margin: 0px 10px;' alt ='Единое национальное тестирование немецкий язык'>
        </a>
        <a href='/subjects/french'>
            <img src='/img/subjects/french.png'  style='margin: 0px 10px;' alt ='ЕНТ Французский язык'>
        </a>
    `,
    html: true,
    confirmButtonText: "Назад"
    });
    };
</script>
@endsection
