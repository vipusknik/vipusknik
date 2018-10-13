{{-- Шапка для маленьких и средних экранов --}}
<div class="flex md:mb-24 lg:hidden" style="margin-bottom: 62px">
    <header class="fixed z-20 w-full bg-blue-darker">
        {{-- Зафиксированная навигация --}}
        <div class="container mx-auto">
            <div class="flex justify-between items-center p-3">
                <div class="mt-1">
                    <button @click="showNavMenu = !showNavMenu">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="inline-block h-8 w-8 fill-current text-white"><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                    </button>
                </div>
                <a href="/" class="block">
                    <img src="/img/vipusknik_logo.png" alt="vipusknik.kz" class="block h-8">
                </a>
                <div class="mt-1">
                    <button @click="showSearchMenu = !showSearchMenu">
                        <svg v-if="!showSearchMenu" class="inline-block h-6 w-8 fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/></svg>
                        <svg v-else class="inline-block h-6 w-8 fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z"/></svg>
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
                <menu class="absolute z-20 h-full flex flex-col bg-blue-dark m-0 p-0 pt-4 lg:p-3 lg:w-1/2" style="width: 18rem">
                    <div class="flex-1">
                        <a href="/institutions/universities" class="block no-underline px-6 py-2 hover:bg-blue-darker">
                            <div class="flex items-center text-white">
                                <div class="w-10 flex-no-shrink text-center mr-8">
                                    <img src="/img/icons/site-categories/universities.png" alt="ВУЗы" class="h-6">
                                    {{-- <svg class="inline-block fill-current w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 37.463 37.463"><path d="M36.355 29.542v-7.679l-1.01-6.055h-9.622l3.126 2.338v3.704l-2.018-1.493v.735h-.599v8.448h-.624v-9.257h.599v-1.112h-.925l-7.014-5.162-6.774 5.287h-.821v1.114h.675v9.131h-.658v-8.322h-.675v-.466l-1.434 1.191v-3.779l2.873-2.356H1.502l-1.01 6.055v7.678H0v2.902h37.463v-2.902h-1.108zM4.93 28.044H1.583v-1.832H4.93v1.832zm0-2.926H1.583v-1.83H4.93v1.83zm1.388 2.926v-1.832h3.346v1.832H6.318zm.001-2.926v-1.83h3.346v1.83H6.319zm12.077-8.84a1.326 1.326 0 1 1 0 2.653 1.326 1.326 0 0 1 0-2.653zm5.388 13.262h-.735v-8.358h-9.507v8.358h-.666v-9.131h.64v-.43h9.852v.304h.416v9.257zm6.402-1.686H26.84v-1.832h3.346v1.832zm0-2.927H26.84v-1.83h3.346v1.83zm4.735 2.927h-3.346v-1.832h3.346v1.832zm0-2.927h-3.346v-1.83h3.346v1.83zM18.295 10.875h-.204V5.41h.427v.104c.468.204 1.601.591 2.239-.101.817-.885 2.248 0 2.248 0v2.522s-1.158-.953-2.248 0c-.829.724-1.814.347-2.239.124v2.816h-.221l9.928 7.425v2.111l-10.042-7.427-8.945 7.427V18.3l9.057-7.425z"/></svg> --}}
                                </div>
                                <span class="flex-1 min-w-0 text-lg">ВУЗы</span>
                            </div>
                        </a>

                        <a href="/institutions/colleges" class="block no-underline px-6 py-2 hover:bg-blue-darker">
                            <div class="flex items-center text-white">
                                <div class="w-10 flex-no-shrink text-center mr-8">
                                    <img src="/img/icons/site-categories/colleges.png" alt="Колледжи" class="h-6">
                                    {{-- <svg class="inline-block fill-current w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M181 120.86h30v30h-30zM241 120.86h30v30h-30zM301 120.86h30v30h-30z"/><path d="M512 210.865v-84.322L256 .135 0 126.542v84.322h60v150H30v60H0v91l512 .001v-91h-30v-60h-30v-150h60zm-327.735 271H30v-31h161.951l-7.686 31zm15.124-61H60v-30h146.827l-7.438 30zM90 360.865v-150h31v150H90zm121 0h-60v-150h60v150zm4.173 121l22.562-91h36.529l22.563 91h-81.654zm25.827-121v-150h30v150h-30zm64.173 30H452v30H312.611l-7.438-30zm-4.173-30v-150h60v150h-60zm90 0v-150h31v150h-31zm91 90v31H327.735l-7.686-31H482zm-452-270v-35.678L256 33.594l226 111.593v35.678H30z"/></svg> --}}
                                </div>
                                <span class="flex-1 min-w-0 text-lg">Колледжи</span>
                            </div>
                        </a>

                        <a href="/specialties/directions" class="block no-underline px-6 py-2 hover:bg-blue-darker">
                            <div class="flex items-center text-white">
                                <div class="w-10 flex-no-shrink text-center mr-8">
                                    <img src="/img/icons/site-categories/specialties.png" alt="Специальности" class="h-6">
                                    {{-- <svg class="inline-block fill-current w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M3.33 8L10 12l10-6-10-6L0 6h10v2H3.33zM0 8v8l2-2.22V9.2L0 8zm10 12l-5-3-2-1.2v-6l7 4.2 7-4.2v6L10 20z"/></svg> --}}
                                </div>

                                <div class="flex-1 min-w-0 text-lg">Специальности</div>
                            </div>
                        </a>

                        <a href="/ent" class="block no-underline px-6 py-2 hover:bg-blue-darker">
                            <div class="flex items-center text-white">
                                <div class="w-10 flex-no-shrink text-center mr-8">
                                    <img src="/img/icons/site-categories/unt.png" alt="ЕНТ" class="h-6">
                                    {{-- <svg class="inline-block fill-current w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 416 416"><path d="M72.103 175.999v32h171.713l20.287-20.285v-11.715zM72.103 239.999v32h107.711l32.002-32zM72.104 303.998h96v32h-96zM403.212 139.108l-22.628-22.627c-6.245-6.245-16.381-6.245-22.626 0l-16.877 16.877 45.255 45.255 16.876-16.877c6.247-6.246 6.247-16.382 0-22.628z"/><path d="M329.797 144.7c-57.43 57.431-74.356 74.298-145.694 145.638V336c38.518-.001 28.774.017 44.917-.07l10.239-10.239 56.844-56.819V384h-256V96h32.002v32h191.998V96h32v59.717l32-31.999V96c0-17.674-14.326-32-32-32h-44.424c-5.926-6.583-13.538-11.62-22.284-14.136-7.368-2.118-13.038-7.788-15.156-15.156C208.474 14.664 190.001 0 168.103 0c-21.898 0-40.37 14.664-46.136 34.707-2.121 7.376-7.805 13.039-15.181 15.164-8.738 2.518-16.342 7.55-22.262 14.129H40.103c-17.673 0-32 14.326-32 32v288c0 17.673 14.327 32 32 32h256c17.674 0 32-14.327 32-32V236.885l46.95-46.93-45.256-45.255zM222.354 319.967c-5.962.034-6.66.034-21.938.032l-.313.001v-23.036l5.214-5.215 22.627 22.628-5.59 5.59zM168.308 31.999c8.837 0 16 7.163 16 16 0 8.836-7.163 16-16 16s-16-7.164-16-16c0-8.837 7.164-16 16-16z"/></svg> --}}
                                </div>

                                <div class="flex-1 min-w-0 text-lg">ЕНТ</div>
                            </div>
                        </a>
                    </div>

                    <div class="flex-none mb-16 px-4 pb-8 text-white text-center">
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
    <div class="fixed z-30 w-full bg-blue-darker font-sans">
        <div class="container mx-auto">
            <div class="about-lg:mx-20">
                <header class="flex">
                    <div class="w-1/4 py-3 px-6">
                        <a href="/">
                            <img src="{{ asset('/img/vipusknik_logo.png') }}" alt="vipusknik.kz" class="h-6 w-auto lg:h-8">
                        </a>
                    </div>
                    <div class="w-1/2">
                        <div class="flex h-full">
                            <a href="/institutions/universities" class="flex items-center px-6 text-lg text-white font-semibold no-underline hover:bg-blue-dark">
                                ВУЗы
                            </a>
                            <a href="/institutions/colleges" class="flex items-center px-6 text-lg text-white font-semibold no-underline hover:bg-blue-dark">
                                Колледжи
                            </a>
                            <a href="/specialties/directions" class="flex items-center px-6 text-lg text-white font-semibold no-underline hover:bg-blue-dark">
                                Специальности
                            </a>
                            <a href="/ent" class="flex items-center px-6 text-lg text-white font-semibold no-underline hover:bg-blue-dark">
                                ЕНТ
                            </a>
                        </div>
                    </div>
                </header>
            </div>
        </div>
    </div>
</div>
