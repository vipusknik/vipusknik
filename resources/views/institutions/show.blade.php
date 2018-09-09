@extends ('layouts.master')

@section ('title', $institution->title)

@section('content')
    @php
        $isUniversity = $institution->type == 'university';
        $isCollege = !$isUniversity;
    @endphp

    <div class="flex flex-col">
        @include ('layouts.header')

        {{-- Контент страницы --}}
        <div class="flex-1 mt-1 lg:bg-grey-light lg:mt-0">
            <main>
                <div class="lg:hidden">
                    @include ('institutions.partials.sm-show-page')
                </div>

                <div class="hidden lg:block container mx-auto">
                <div class="hidden lg:flex container mx-auto">
                    @include ('institutions.partials.lg-show-page')
                </div>
            </main>
        </div>
    </div>
@endsection

@section ('styles')
    <style>
        iframe {
            width: 100% !important;
            height: 250px !important;
        }

        @media (min-width: 992px) {
            iframe {
                width: 100% !important;
                height: 200px !important;
            }
        }

        .institution-specialty-list > div:nth-child(odd) {
            background: #DEDEDC;
        }

        .university-specialty-table-body > tr:nth-child(odd) {
            background: #DEDEDC;
        }

        .university-specialty-table-body > tr:nth-child(even) > td:not(:last-child) > div {
            border-color: transparent;
        }

        .college-qualification:not(:last-child) {
            border-bottom: 1px solid grey;
        }
    </style>
@endsection
