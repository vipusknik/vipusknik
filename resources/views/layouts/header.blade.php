{{-- Шапка для маленьких и средних экранов --}}
<div class="flex md:mb-24 lg:hidden" style="margin-bottom: 62px">
    <header class="fixed z-20 w-full bg-blue-darker">
        {{-- Зафиксированная навигация --}}
        <div class="container mx-auto">
            <div class="flex justify-between items-center p-3">
                <div class="mt-1">
                    <button @click="showNavMenu = !showNavMenu">
                        <svg viewBox="0 0 20 20" class="inline-block h-8 w-8 fill-current text-white"><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                    </button>
                </div>
                <a href="/" class="block">
                    <img src="/img/vipusknik_logo.png" alt="vipusknik.kz" class="block h-8">
                </a>
                <div class="mt-1">
                    <button @click="showSearchMenu = !showSearchMenu">
                        <svg v-if="!showSearchMenu" class="inline-block h-6 w-8 fill-current text-white" viewBox="0 0 20 20"><path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/></svg>
                        <svg v-else class="inline-block h-6 w-8 fill-current text-white" viewBox="0 0 20 20"><path d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z"/></svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Главное левое меню --}}
        <div v-if="showNavMenu" class="font-sans relative">
            <div class="absolute w-full h-screen z-20">
                {{-- поддложка --}}
                <div @click.self="showNavMenu = false" class="absolute z-20 w-full h-full bg-transparent-40"></div>

                {{-- меню --}}
                <menu class="absolute z-20 h-full flex flex-col bg-blue-dark m-0 p-0 pt-4 lg:p-3 lg:w-1/2 font-franklin-gothic" style="width: 18rem">
                    <div class="flex-1">
                        <a href="/institutions/universities" class="block no-underline px-6 py-2 hover:bg-blue-darker tracking-wide">
                            <div class="flex items-center text-white">
                                <div class="w-10 flex-no-shrink text-center mr-8">
                                    <img src="/img/icons/site-categories/universities.png" alt="ВУЗы" class="h-6">
                                </div>
                                <span class="flex-1 min-w-0 text-lg">ВУЗы</span>
                            </div>
                        </a>

                        <a href="/institutions/colleges" class="block no-underline px-6 py-2 hover:bg-blue-darker tracking-wide">
                            <div class="flex items-center text-white">
                                <div class="w-10 flex-no-shrink text-center mr-8">
                                    <img src="/img/icons/site-categories/colleges.png" alt="Колледжи" class="h-6">
                                </div>
                                <span class="flex-1 min-w-0 text-lg">Колледжи</span>
                            </div>
                        </a>

                        <a href="/specialties" class="block no-underline px-6 py-2 hover:bg-blue-darker tracking-wide">
                            <div class="flex items-center text-white">
                                <div class="w-10 flex-no-shrink text-center mr-8">
                                    <img src="/img/icons/site-categories/specialties.png" alt="Специальности" class="h-6">
                                </div>

                                <div class="flex-1 min-w-0 text-lg">Специальности</div>
                            </div>
                        </a>

                        <a href="/ent" class="block no-underline px-6 py-2 hover:bg-blue-darker tracking-wide">
                            <div class="flex items-center text-white">
                                <div class="w-10 flex-no-shrink text-center mr-8">
                                    <img src="/img/icons/site-categories/unt.png" alt="ЕНТ" class="h-6">
                                </div>

                                <div class="flex-1 min-w-0 text-lg">ЕНТ</div>
                            </div>
                        </a>
                    </div>

                    <div class="font-cuprum flex-none mb-16 px-4 pb-8 text-white text-center">
                        <div class="mb-12">
                            <div>Воспользуйтесь <a href="#" @click="$modal.show('feedback-modal')" class="text-orange no-underline">обратной связью</a></div>
                            <div class="mb-4">или напишите нам:</div>
                            <a href="mailto:vipusknik@gmail.com" class="block text-white no-underline">vipusknik@gmail.com</a>
                        </div>

                        <div class="text-xs">
                            <div class="mb-3" style="word-spacing: 4px">Все логотипы и торговые марки на сайте являются собственностью их владельцев.</div>
                            <div>Все права защищены © ИПФ "Артекс" {{ Carbon\Carbon::now()->year }} г.</div>
                        </div>
                    </div>
                </menu>
            </div>
        </div>

        {{-- Выпадающее меню поиска --}}
        <div v-if="showSearchMenu" class="relative">
            <div class="absolute pin-t w-full h-screen">
                {{-- подложка --}}
                <div @click.self="showSearchMenu = false" class="absolute z-10 w-full h-full bg-transparent-40"></div>

                {{-- поисковое меню --}}
                <div class="absolute z-10 w-full bg-orange">
                    <div class="container mx-auto p-3">
                        {{ $smHeaderDropdownMenu }}
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>

{{--Шапка для больших экранов --}}
<div class="hidden lg:flex mb-16">
    <div class="fixed z-30 w-full bg-blue-darker font-franklin-gothic">
        <div class="container mx-auto">
            <div class="about-lg:mx-20">
                <header class="flex">
                    <div class="flex-no-shrink py-3 px-6 mr-12">
                        <a href="/" class="block py-px">
                            <img src="{{ asset('/img/vipusknik_logo.png') }}" alt="vipusknik.kz" class="h-6 w-auto lg:h-8 lg:mt-px">
                        </a>
                    </div>
                    <div>
                        <div class="flex h-full">
                            <a href="/institutions/universities" class="flex items-center px-8 text-xl text-white tracking-wide no-underline hover:bg-blue-dark">
                                ВУЗы
                            </a>
                            <a href="/institutions/colleges" class="flex items-center px-8 text-xl text-white tracking-wide no-underline hover:bg-blue-dark">
                                Колледжи
                            </a>
                            <a href="/specialties" class="group relative text-xl text-white tracking-wide no-underline hover:bg-blue-dark">
                                <div class="flex h-full items-center px-6">Специальности</div>
                                <div class="absolute z-10 hidden group-hover:block w-full bg-blue-dark">
                                    <div class="bg-white h-1"></div>
                                    <div class="text-center text-white py-3 text-lg hover:bg-blue-darker"
                                         onclick="event.preventDefault(); window.location.href='{{ route('specialties.directions.index', 'university') }}'">
                                        Бакалавриат
                                    </div>
                                    <div class="text-center text-white py-3 text-lg hover:bg-blue-darker"
                                         onclick="event.preventDefault(); window.location.href='{{ route('specialties.directions.index', 'college') }}'">
                                        Специальности и квалификации коледжа
                                    </div>
                                </div>
                            </a>
                            <a href="/ent" class="flex items-center px-8 text-xl text-white tracking-wide no-underline hover:bg-blue-dark">
                                ЕНТ
                            </a>
                        </div>
                    </div>
                </header>
            </div>
        </div>
    </div>
</div>
