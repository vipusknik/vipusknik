@extends ('layouts.master')

@section ('title', 'Портал для абитуриентов')

@section('content')
    <div class="min-h-screen flex flex-col">
        @component('layouts.header')
            @slot ('smHeaderDropdownMenu')
                <form action="#">
                    <input type="search" class="block w-full h-12 text-grey py-4 px-6" placeholder="Add placeholder">
                </form>
            @endslot
        @endcomponent

        {{-- Контент страницы --}}
        <div class="flex-1 mt-2 lg:bg-grey-light lg:mt-0">
            <main class="container mx-auto">
                <div class="lg:hidden">
                    {{-- Счетчик дней до ент --}}
                    <div class="py-1 text-center bg-orange text-white leading-normal">
                        До ЕНТ осталось 137 дней
                    </div>

                    {{-- Ссылки --}}
                    <div class="flex flex-col items-center py-2" style="background-image: linear-gradient(to top, #ece6ea, #f0ecf0, #f5f3f5, #f9f9fa, #ffffff);">
                        <a href="/articles/kak-podgotovitsya-k-ekzamenam" class="text-blue-lightish border-b border-blue-lightish no-underline leading-none tracking-tight mb-2">
                            Подготовиться к экзаменам
                        </a>
                        <a href="/testent" class="text-blue-lightish border-b border-blue-lightish no-underline leading-none tracking-tight mb-2">
                            Выбрать профессию
                        </a>
                        <a href="/ent" class="text-blue-lightish border-b border-blue-lightish no-underline leading-none tracking-tight">
                            Посмотреть доп. материал
                        </a>
                    </div>

                    {{-- Картинка со школьниками --}}
                    <div class="mb-3">
                        <img src="/img/group-of-students.jpg" class="w-full h-auto -mt-1" alt="">
                    </div>

                    {{-- Статья --}}
                    <article class="px-3 mb-1">
                        <div class="flex items-center justify-center mb-2">
                            <img src="" alt="">
                            <h4 class="uppercase text-sm text-blue-lightish font-franklin-gothic tracking-wide font-normal flex items-center">
                                <span class="w-8 h-8 flex items-center justify-center bg-blue-lightish mr-2">
                                    <svg class="inline-block w-4 h-4 fill-current text-white" viewBox="0 0 512 512"><circle cx="256" cy="378.5" r="25"/><path d="M256 0C114.516 0 0 114.497 0 256c0 141.484 114.497 256 256 256 141.484 0 256-114.497 256-256C512 114.516 397.503 0 256 0zm0 472c-119.377 0-216-96.607-216-216 0-119.377 96.607-216 216-216 119.377 0 216 96.607 216 216 0 119.377-96.607 216-216 216z"/><path d="M256 128.5c-44.112 0-80 35.888-80 80 0 11.046 8.954 20 20 20s20-8.954 20-20c0-22.056 17.944-40 40-40s40 17.944 40 40-17.944 40-40 40c-11.046 0-20 8.954-20 20v50c0 11.046 8.954 20 20 20s20-8.954 20-20v-32.531c34.466-8.903 60-40.26 60-77.469 0-44.112-35.888-80-80-80z"/></svg>
                                </span>
                                Путеводитель в мир образования
                            </h4>
                        </div>

                        <div class="font-cuprum text-grey-darkest">
                            <p class="mb-1 pl-3"><span class="pl-3">Извечный</span> вопрос: кем я хочу быть?! Как выбрать ту самую, именно Вам подходящую профессию (специальность)? Как выбрать именно Вам подходящий вуз или колледж? Каждый старшеклассник вместе со своими родителями задается этими вопросами хотя бы раз в жизни. Сегодня на нас льются огромные потоки информации из всевозможных источников. Исключением не является и информация об учебных заведениях. </p>
                            <p class="mb-1 pl-3"><span class="pl-3">Выбрать</span> один достоверный и удобный специализированный источник порой очень сложно. Поэтому наша команда, которая на протяжении 18-ти лет выпускает бумажную версию справочника для выпускников «АБИТУРИЕНТ», создала данный проект в помощь школьникам и их родителям. </p>
                            <p class=""><span class="pl-3">Мы</span> объединили на одном ресурсе ВСЕ образовательные организации Казахстана. <span class="text-blue-lightish">За Вами только выбор!</span></p>
                        </div>
                    </article>

                    {{-- Баннер 1 --}}
                    <div class="mb-px">
                        <img src="https://vipusknik.kz/img/vktek.gif" class="w-full h-auto" alt="">
                    </div>

                    {{-- News link --}}
                    <div class="mb-2 bg-orange py-2 flex items-center justify-center">
                        <a href="#" class="uppercase font-franklin-gothic text-2xl tracking-wide text-white no-underline border-b border-white">
                            новости
                        </a>
                    </div>

                    {{-- Статья --}}
                    <article class="px-3">
                        <div class="flex items-center justify-center mb-2">
                            <img src="" alt="">
                            <h4 class="uppercase text-sm text-blue-dark font-franklin-gothic tracking-wide font-normal">Выбираю Казахстан!</h4>
                        </div>

                        <div class="font-cuprum text-grey-darkest">
                            <p>Ни для кого не секрет, что в настоящее время существует большой отток казахстанских выпускников в российские и европейские вузы. Причины тому разные, но мы нацелены на аудиторию будущих казахстанских студентов. Мы выступаем в поддержку учебных заведений Казахстана. Сегодня рынок труда в республике испытывает существенный дефицит квалифицированных кадров. В наше динамичное время, когда экономика и промышленность оснащены новейшими технологиями почти во всех сферах, мы получили огромное количество новых современных профессий, но недостаточно дипломированных специалистов. Также по-прежнему существует острая нехватка в инженерно-техническом составе, в добывающей и нефтегазовой отрасли, нужны пилоты и бортинженеры, врачи, педагоги и др.</p>
                        </div>
                    </article>

                    {{-- Баннер 2 --}}
                    <div class="mb-5"></div>

                    {{-- Статья --}}
                    <article class="px-3">
                        <div class="flex items-center justify-center mb-2">
                            <img src="" alt="">
                            <h4 class="uppercase text-sm text-blue-dark font-franklin-gothic tracking-wide font-normal">Зачем нужно образование?</h4>
                        </div>

                        <div class="font-cuprum text-black">
                            <p>Современная молодежь понимает: если хочешь получить хорошую работу, быть востребованным, иметь возможность строить карьеру на родине, открыть свое дело, то для этого необходимо учиться. Тем более что в Казахстане есть достаточно вузов и колледжей, вполне способных удовлетворить потребности рынка. Иногда жизнь диктует необходимость повышения квалификации или приобретения новых (смежных) специальностей. Здесь в помощь снова придет наш сайт. Не поддавайтесь веяниям «модных профессий» - мало востребованных из-за переизбытка готовых кадров. Прислушайтесь к тому, чего Вы по-настоящему хотите, и есть ли у Вас на это силы и возможности. Для выпускников вузов и колледжей наступило благодатное время. Многие отечественные компании стали всерьез задумываться о кадровом резерве, о молодом потенциале, в который они готовы вкладывать, инвестировать и дальше его развивать. За перспективных выпускников сейчас на рынке существует реальная борьба. От студентов лишь требуется учиться тому, к чему лежит сердце и душа, и учиться хорошо. А самое главное – работать над саморазвитием, то есть стремиться быть лучшим в своей области.</p>
                        </div>
                    </article>
                </div>

                <div class="hidden lg:block lg:bg-white lg:shadow-lg about-lg:mx-20" style="min-height: 700px">
                    @include ('lg-home-page')
                </div>
            </main>
        </div>

        <div class="hidden lg:block">
            @include('layouts.footer')
        </div>
    </div>
@endsection

@section ('styles')
    <style>
        .triangle-topleft {
            width: 0;
            height: 0;
            border-top: 26px solid #2f84a9;
            border-right: 20px solid transparent;
        }
    </style>
@endsection
