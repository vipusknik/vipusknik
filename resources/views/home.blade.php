@extends ('layouts.master')

@section ('title', 'Портал для абитуриентов')

@section('content')
    <div class="min-h-screen flex flex-col">
        @component('layouts.header')
            @slot ('smHeaderDropdownMenu')
                @include ('search-form')
            @endslot
        @endcomponent

        {{-- Контент страницы --}}
        <div class="flex-1 mt-2 lg:bg-grey-light lg:mt-0">
            <main class="container mx-auto">
                <div class="lg:hidden">
                    @include ('carousel')
                    {{-- Счетчик дней до ент --}}
                    <div class="py-1 text-center bg-orange text-white leading-normal">
                        {{ \App\Modules\Unt::counterText() }}
                    </div>

                    {{-- Ссылки --}}
                    <div class="flex flex-col items-center py-2" style="background-image: linear-gradient(to top, #ece6ea, #f0ecf0, #f5f3f5, #f9f9fa, #ffffff);">
                        <a href="/articles/kak-podgotovitsya-k-ekzamenam" class="text-blue-lightish border-b border-blue-lightish no-underline leading-none tracking-tight mb-2">
                            Подготовиться к экзаменам
                        </a>
                        <a href="/professions/categories" class="text-blue-lightish border-b border-blue-lightish no-underline leading-none tracking-tight mb-2">
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
                        <h4 class="flex items-center justify-center mb-3 uppercase text-blue-lightish font-franklin-gothic font-normal">
                            <div class="w-8 h-8 flex items-center justify-center bg-blue-lightish mr-2">
                                <img class="w-4 h-auto mt-1" src="/img/icons/question.png">
                            </div>
                            <div class="mt-1">
                                Путеводитель в мир образования
                            </div>
                        </h4>

                        <div class="font-cuprum text-grey-darkest">
                            <p class="mb-1 pl-3"><span class="pl-3">Извечный</span> вопрос: кем я хочу быть?! Как выбрать ту самую, именно Вам подходящую профессию (специальность)? Как выбрать именно Вам подходящий вуз или колледж? Каждый старшеклассник вместе со своими родителями задается этими вопросами хотя бы раз в жизни. Сегодня на нас льются огромные потоки информации из всевозможных источников. Исключением не является и информация об учебных заведениях. </p>
                            <p class="mb-1 pl-3"><span class="pl-3">Выбрать</span> один достоверный и удобный специализированный источник порой очень сложно. Поэтому наша команда, которая на протяжении 18-ти лет выпускает бумажную версию справочника для выпускников «АБИТУРИЕНТ», создала данный проект в помощь школьникам и их родителям. </p>
                            <p><span class="pl-3">Мы</span> объединили на одном ресурсе ВСЕ образовательные организации Казахстана. <span class="text-blue-lightish">За Вами только выбор!</span></p>
                        </div>
                    </article>

                    {{-- Баннер 1 --}}
                    <div class="mb-px">
                        <img src="/img/vktek.gif" class="w-full h-auto">
                    </div>

                    {{-- News link --}}
                    <div class="mb-3 bg-orange py-2 flex items-center justify-center">
                        <a href="#" class="flex items-center justify-center no-underline">
                            <div class="flex items-center justify-center w-10 h-8 bg-blue-lightish mr-3">
                                <img class="w-6 h-auto" src="/img/icons/news.png">
                            </div>
                            <span class="uppercase font-franklin-gothic text-2xl tracking-wide text-white border-b border-white">новости</span>
                        </a>
                    </div>

                    {{-- Статья --}}
                    <article class="px-3 mb-3">
                        <h4 class="flex items-center justify-center mb-3 uppercase text-blue-lightish font-franklin-gothic font-normal">
                            <div class="w-8 h-8 flex items-center justify-center bg-blue-lightish mr-2">
                                <img class="w-4 h-auto mt-1" src="/img/icons/mark.png">
                            </div>
                            <div class="mt-1">
                                Выбираю Казахстан!
                            </div>
                        </h4>

                        <div class="font-cuprum text-grey-darkest">
                            <p>Ни для кого не секрет, что в настоящее время существует большой отток казахстанских выпускников в российские и европейские вузы. Причины тому разные, но мы нацелены на аудиторию будущих казахстанских студентов. Мы выступаем в поддержку учебных заведений Казахстана. Сегодня рынок труда в республике испытывает существенный дефицит квалифицированных кадров. В наше динамичное время, когда экономика и промышленность оснащены новейшими технологиями почти во всех сферах, мы получили огромное количество новых современных профессий, но недостаточно дипломированных специалистов. Также по-прежнему существует острая нехватка в инженерно-техническом составе, в добывающей и нефтегазовой отрасли, нужны пилоты и бортинженеры, врачи, педагоги и др.</p>
                        </div>
                    </article>

                    {{-- Баннер 2 --}}
                    <div class="mb-3 px-3">
                        <img src="/img/Langberry.gif" class="w-full h-auto">
                    </div>

                    {{-- Статья --}}
                    <article class="px-3">
                        <h4 class="flex items-center justify-center mb-3 uppercase text-blue-lightish font-franklin-gothic font-normal">
                            <div class="w-8 h-8 flex items-center justify-center bg-blue-lightish mr-2">
                                <img class="w-4 h-auto mt-1" src="/img/icons/exclamation.png">
                            </div>
                            <div class="mt-1">
                                Зачем нужно образование?
                            </div>
                        </h4>

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
