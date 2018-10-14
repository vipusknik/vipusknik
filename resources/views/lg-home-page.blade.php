@include ('carousel')
@include ('search-input')

<div class="flex px-4 mb-6">
    <div class="w-3/4 mr-3">
        <div class="flex">
            <a href="/articles/kak-podgotovitsya-k-ekzamenam" class="flex-1 flex no-underline text-white font-franklin-gothic">
                <div class="bg-blue-dark flex-1 text-center p-1">Подготовиться к экзаменам</div>
                <div class="triangle-topleft"></div>
            </a>
            <a href="/testent" class="flex-1 flex no-underline text-white font-franklin-gothic">
                <div class="bg-blue-dark flex-1 text-center p-1">Выбрать профессию</div>
                <div class="triangle-topleft"></div>
            </a>
            <a href="/ent" class="flex-1 flex no-underline text-white font-franklin-gothic">
                <div class="bg-blue-dark flex-1 text-center p-1">Посмотреть доп. материал</div>
                <div class="triangle-topleft"></div>
            </a>
        </div>

        <div class="mt-8">
            <h2 class="font-franklin-gothic font-normal text-blue-lightish text-center uppercase mb-1 text-2xl">
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
            до ЕНТ осталось 138 дней
        </div>

        {{-- News --}}
        <div>
            <div class="mb-1 flex items-center justify-center bg-blue-lightish py-2 font-franklin-gothic uppercase text-2xl text-center text-white">
                Новости
            </div>

            <div>
                @foreach ($articles as $article)
                    <div class="py-2 mb-2">
                        <h3 class="text-center font-franklin-gothic mb-1">
                            <a href="{{ route('articles.show', $article) }}" class="font-normal text-blue-dark no-underline hover:underline">{{ $article->title }}</a>
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
<div></div>

{{-- Articles --}}
<div class="flex px-4">
    <div class="w-3/5">
        <div class="mb-4">
            <h2 class="font-franklin-gothic font-normal text-blue-lightish text-center uppercase mb-1 text-2xl">
                Выбираю Казахстан!
            </h2>
            <article class="text-grey-darkest p-2">
                Ни для кого не секрет, что в настоящее время существует большой отток казахстанских выпускников в российские и европейские вузы. Причины тому разные, но мы нацелены на аудиторию будущих казахстанских студентов. Мы выступаем в поддержку учебных заведений Казахстана. Сегодня рынок труда в республике испытывает существенный дефицит квалифицированных кадров. В наше динамичное время, когда экономика и промышленность оснащены новейшими технологиями почти во всех сферах, мы получили огромное количество новых современных профессий, но недостаточно дипломированных специалистов. Также по-прежнему существует острая нехватка в инженерно-техническом составе, в добывающей и нефтегазовой отрасли, нужны пилоты и бортинженеры, врачи, педагоги и др.
            </article>
        </div>

        <div class="mb-2">
            <h2 class="font-franklin-gothic font-normal text-blue-lightish text-center uppercase mb-1 text-2xl">
                Зачем нужно образование?
            </h2>
            <article class="text-grey-darkest p-2">
                Современная молодежь понимает: если хочешь получить хорошую работу, быть востребованным, иметь возможность строить карьеру на родине, открыть свое дело, то для этого необходимо учиться. Тем более что в Казахстане есть достаточно вузов и колледжей, вполне способных удовлетворить потребности рынка. Иногда жизнь диктует необходимость повышения квалификации или приобретения новых (смежных) специальностей. Здесь в помощь снова придет наш сайт. Не поддавайтесь веяниям «модных профессий» - мало востребованных из-за переизбытка готовых кадров. Прислушайтесь к тому, чего Вы по-настоящему хотите, и есть ли у Вас на это силы и возможности. Для выпускников вузов и колледжей наступило благодатное время. Многие отечественные компании стали всерьез задумываться о кадровом резерве, о молодом потенциале, в который они готовы вкладывать, инвестировать и дальше его развивать. За перспективных выпускников сейчас на рынке существует реальная борьба. От студентов лишь требуется учиться тому, к чему лежит сердце и душа, и учиться хорошо. А самое главное – работать над саморазвитием, то есть стремиться быть лучшим в своей области.
            </article>
        </div>

        <h4 class="font-franklin-gothic text-blue-light font-normal text-center text-lg mb-6">Удачи Вам! У Вас все получится!</h4>
    </div>
    
    <div class="w-2/5">
        <img src="/img/cheerful-man-and-woman-with-diplomas.jpg" alt="">
    </div>
</div>