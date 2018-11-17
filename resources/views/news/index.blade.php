@extends ('layouts.master')

@section ('title', 'Портал для абитуриентов')

@section('content')
    <div class="min-h-screen flex flex-col">
        @component('layouts.header')
            @slot ('smHeaderDropdownMenu')
                @include ('search-form')
            @endslot
        @endcomponent

        <div class="container mx-auto">
            <main>
                <div>
                    <div class="mb-1 flex items-center justify-center bg-blue-lightish py-2 font-franklin-gothic uppercase text-2xl text-center text-white">
                        <div class="flex h-8 w-10 items-center justify-center mr-1 -ml-2">
                            <img class="w-6 h-auto mb-1" src="/img/icons/news.png">
                        </div>
                        Новости
                    </div>

                    <div class="px-2">
                        @foreach ($news as $article)
                            <div class="py-2 mb-2">
                                <h3 class="text-center font-franklin-gothic mb-1">
                                    <a href="{{ route('articles.show', $article) }}" class="font-normal text-xl text-blue-dark no-underline hover:underline tracking-tight text-blue-lightish">
                                        {{ $article->title }}
                                    </a>
                                </h3>
                                <article class="px-3 text-lg text-grey-darkest leading-tight">
                                    {{ $article->short_description }}
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            </main>
        </div>

        <div class="hidden lg:block">
            @include('layouts.footer')
        </div>
    </div>
@endsection
