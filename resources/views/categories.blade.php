@extends('layouts.main')


@section('name')
    @if ($category)
        {{ $category->title }}
    @elseif ($post)
        {{ $post->title }}
    @endif
@endsection

@section('seo_title')
    @if ($category)
        @if ($category->seo_title)
            {{ $category->seo_title }}@else{{ $category->title }}
        @endif
    @elseif ($post)
        @if ($post->seo_title)
            {{ $post->seo_title }}@else{{ $post->title }}
        @endif
    @endif
@endsection


@section('seo_description')
    @if ($category)
        {{ $category->seo_description }}
    @elseif ($post)
        {{ $post->seo_description }}
    @endif
@endsection


@section('background')
    @if ($category->background)
        <img src="storage/{{ $post->background }}" alt="">
    @else
        <img src="{{ asset('img/1.jpg') }}" alt="">
    @endif
@endsection


@section('content')
    <main>
        @include('components.breadcrumbs')




        @if ($categories->count())
            <div class="bg-gray-50">
                <div class="mx-auto flex flex-wrap w-full">
                    <div class="grid grid-cols-1 md:grid-cols-2  xl:grid-cols-3 gap-8 w-full">
                        @foreach ($categories as $category)
                            <div
                                class="flex flex-col shadow-xl rounded-xl h-full bg-white hover:scale-105 transition ease-in-out delay-150 justify-between">
                                <a href="/{{ $category->slug }}">
                                    @if ($category->preview)
                                        <img loading="lazy"
                                            class=" flex-none object-cover object-center w-full lg:h-64 md:h-36 rounded-t-xl"
                                            src="/storage/{{ $category->preview }}" alt="">
                                    @endif
                                    <div class="py-4 px-3 text-left">
                                        <p class="product__card__title m-0">{{ $category->title }}</p>
                                    </div>
                                    <div class="px-4 py-4 bg-green-section border rounded-b-xl">
                                        <a href="/{{ $category->slug }}"
                                            class="inline-flex items-center mt-auto font-semibold lg:mb-0 hover:text-green-700 w-full"
                                            title="{{ $category->title }}">
                                            Подробнее</a>

                                    </div>
                                </a>
                            </div>

                            @foreach ($category->childrenCategories as $childCategory)
                                @include('child_category', ['child_category' => $childCategory])
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        @endif





        @if ($posts->count())
            <div class="bg-gray-50">
                <div class="mx-auto flex flex-wrap w-full">
                    <div class="grid grid-cols-1 md:grid-cols-2  xl:grid-cols-3 gap-8 w-full">
                        @foreach ($posts as $item)
                            <div
                                class="flex flex-col shadow-xl rounded-xl h-full bg-white hover:scale-105 transition ease-in-out delay-150 justify-between">
                                <a href="/{{ $item->category->slug }}/{{ $item->slug }}">

                                    @if ($item->preview)
                                        <img loading="lazy"
                                            class=" flex-none object-cover object-center w-full lg:h-64 md:h-36 rounded-t-xl"
                                            src="/storage/{{ $item->preview }}" alt="">
                                    @endif

                                    <div class="py-4 px-3 text-left">
                                        <p class="product__card__title m-0">{{ $item->title }}</p>
                                    </div>
                                </a>
                                <div class="px-4 py-4 bg-green-section border rounded-b-xl flex flex-between">
                                    <a href="/{{ $item->category->slug }}/{{ $item->slug }}"
                                        class="inline-flex items-center mt-auto font-semibold lg:mb-0 hover:text-green-700 w-full"
                                        title="{{ $item->title }}">
                                        Подробнее</a>

                                </div>
                            </div>
                        @endforeach
                        @if ($posts->links())
                            {{ $posts->links() }}
                        @endif

                    </div>
                </div>
            </div>
        @endif



    </main>

@endsection
