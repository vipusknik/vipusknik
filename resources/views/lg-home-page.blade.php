@include ('carousel')

@include ('search-form')

<div class="flex px-4 mb-4">
    <div class="w-3/4 mr-3">
        <div class="flex">
            <a href="/articles/kak-podgotovitsya-k-ekzamenam" class="flex-1 flex no-underline text-white font-franklin-gothic lg:text-sm">
                <div class="bg-blue-lightish flex-1 text-center py-2 flex items-center justify-center">Подготовиться к экзаменам</div>
                <div class="triangle-top-left h-full w-10 bg-blue-lightish"></div>
            </a>
            <a href="/professions/categories" class="flex-1 flex no-underline text-white font-franklin-gothic lg:text-sm">
                <div class="bg-blue-lightish flex-1 text-center py-2 flex items-center justify-center">Выбрать профессию</div>
                <div class="triangle-top-left h-full w-10 bg-blue-lightish"></div>
            </a>
            <a href="/ent" class="flex-1 flex no-underline text-white font-franklin-gothic lg:text-sm">
                <div class="bg-blue-lightish flex-1 text-center py-2 flex items-center justify-center">Посмотреть доп. материал</div>
                <div class="triangle-top-left h-full w-10 bg-blue-lightish"></div>
            </a>
        </div>

        <div class="mt-8">
            <h2 class="mini-article-heading font-hairline flex pl-32 items-center font-franklin-gothic text-blue-lightish text-center uppercase mb-1">
                <div class="flex h-8 w-10 items-center justify-center bg-blue-dark mr-3">
                    <img class="w-4 h-auto mt-1" src="/img/icons/question.png">
                </div>
                Путеводитель в мир образования
            </h2>
            <article class="text-grey-darkest">
                <div class="p-2" style="background-image: linear-gradient(to top, #ece6ea, #f0ecf0, #f5f3f5, #f9f9fa, #ffffff);">
                    <div class="mb-1">
                        <span class="ml-3">Извечный</span> вопрос: кем я хочу быть?! Как выбрать ту самую, именно Вам подходящую профессию (специальность)? Как выбрать именно Вам подходящий вуз или колледж? Каждый старшеклассник вместе со своими родителями задается этими вопросами хотя бы раз в жизни. Сегодня на нас льются огромные потоки информации из всевозможных источников. Исключением не является и информация об учебных заведениях.
                    </div>
                    <div class="mb-1">
                        <span class="ml-3">Выбрать</span> один достоверный и удобный специализированный источник порой очень сложно. Поэтому наша команда, которая на протяжении 18-ти лет выпускает бумажную версию справочника для выпускников «АБИТУРИЕНТ», создала данный проект в помощь школьникам и их родителям.
                    </div>
                    <div class="mb-1">
                        <span class="ml-3">Мы</span> объединили на одном ресурсе ВСЕ образовательные организации Казахстана. <span class="text-blue-dark">За Вами только выбор!</span>
                    </div>
                </div>

                <img src="/img/group-of-students.jpg" alt="" class="block w-full h-auto">
            </article>
        </div>
    </div>

    <div class="w-1/4 pt-1">
        {{-- Counter--}}
        <div class="bg-blue-darker p-2 text-center font-franklin-gothic antialiased tracking-wide text-white mb-2">
            {{ \App\Modules\Unt::counterText() }}
        </div>

        {{-- News --}}
        <div>
            <a href="/news" class="mb-1 flex no-underline items-center justify-center bg-blue-lightish py-2 font-franklin-gothic uppercase text-2xl text-center text-white">
                <div class="flex h-8 w-10 items-center justify-center mr-1 -ml-2">
                    <img class="w-6 h-auto mb-1" src="/img/icons/news.png">
                </div>
                Новости
            </a>

            <div>
                @foreach ($articles as $article)
                    <div class="py-2 mb-2">
                        <h3 class="text-center font-franklin-gothic mb-1">
                            <a href="{{ route('articles.show', $article) }}" class="font-normal text-blue-dark no-underline hover:underline tracking-tight text-blue-lightish">
                                {{ $article->title }}
                            </a>
                        </h3>
                        <article class="text-grey-darkest leading-tight">
                            {{ $article->short_description }}
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

{{-- Banners --}}
<div class="flex mb-4 px-4">
    <div class="w-1/2 mr-3">
        <a href="/institutions/colleges/vostochno-kazakhstanskiy-tekhniko-ekonomicheskiy-kolledzh" target="_blank">
            <img src="/img/vktek.gif" class="w-full h-auto">
        </a>
    </div>
    <div class="w-1/2">
        <a href="http://vipusknik.kz/institutions/college/ust-kamenogorskiy-mnogoprofilnyy-tehnologicheskiy-kolledzh" target="_blank">
            <img src="/img/mnogopr.jpg" class="w-full h-auto">
        </a>
    </div>
</div>

{{-- Articles --}}
<div class="main-page-articles-bg">
    <div class="flex px-4 bg-no-repeat bg-contain bg-right cheerfull-man-and-woman-bg">
        <div class="w-3/5">
            <div class="mb-4">
                <h2 class="mini-article-heading font-hairline flex pl-32 items-center font-franklin-gothic text-blue-lightish text-center uppercase mb-1">
                    <div class="flex h-8 w-10 items-center justify-center bg-blue-dark mr-3">
                        <img class="w-4 h-auto mt-1" src="/img/icons/mark.png">
                    </div>
                    Выбираю Казахстан!
                </h2>
                <article class="text-grey-darkest p-2">
                    <p class="mb-1">
                        <span class="ml-3">Ни</span> для кого не секрет, что в настоящее время существует большой отток казахстанских выпускников в российские и европейские вузы.
                        Причины тому разные, но мы нацелены на аудиторию будущих казахстанских студентов.
                        Мы выступаем в поддержку учебных заведений Казахстана.
                    </p>
                    <p class="mb-1">
                        <span class="ml-3">Сегодня</span> рынок труда в республике испытывает существенный дефицит квалифицированных кадров.
                        В наше динамичное время, когда экономика и промышленность оснащены новейшими технологиями почти во всех сферах,
                        мы получили огромное количество новых современных профессий, но недостаточно дипломированных специалистов.
                    </p>
                    <p>
                        <span class="ml-3">Также</span> по-прежнему существует острая нехватка в инженерно-техническом составе, в добывающей и нефтегазовой отрасли,
                        нужны пилоты и бортинженеры, врачи, педагоги и др.
                    </p>
                </article>
            </div>

            <div class="mb-2">
                <h2 class="mini-article-heading font-hairline flex pl-32 items-center font-franklin-gothic text-blue-lightish text-center uppercase mb-1">
                    <div class="flex h-8 w-10 items-center justify-center bg-blue-dark mr-3">
                        <img class="w-4 h-auto mt-1" src="/img/icons/exclamation.png">
                    </div>
                    Зачем нужно образование?
                </h2>
                <article class="text-grey-darkest p-2">
                    <span class="ml-3">Современная</span> молодежь понимает: если хочешь получить хорошую работу, быть востребованным, иметь возможность строить карьеру на родине,
                    открыть свое дело, то для этого необходимо учиться.
                    Тем более что в Казахстане есть достаточно вузов и колледжей, вполне способных удовлетворить потребности рынка.
                    Иногда жизнь диктует необходимость повышения квалификации или приобретения новых (смежных) специальностей.
                    Здесь в помощь снова придет наш сайт.
                    Не поддавайтесь веяниям «модных профессий» - мало востребованных из-за переизбытка готовых кадров.
                    Прислушайтесь к тому, чего Вы по-настоящему хотите, и есть ли у Вас на это силы и возможности.
                    Для выпускников вузов и колледжей наступило благодатное время.
                    Многие отечественные компании стали всерьез задумываться о кадровом резерве, о молодом потенциале,
                    в который они готовы вкладывать, инвестировать и дальше его развивать.
                    За перспективных выпускников сейчас на рынке существует реальная борьба.
                    От студентов лишь требуется учиться тому, к чему лежит сердце и душа, и учиться хорошо.
                    А самое главное – работать над саморазвитием, то есть стремиться быть лучшим в своей области.
                </article>
            </div>

            <h4 class="font-franklin-gothic text-blue-light font-normal text-center text-lg mb-6">Удачи Вам! У Вас все получится!</h4>
        </div>
    </div>
</div>
