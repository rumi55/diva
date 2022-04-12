@extends('layouts.main')



@section('background')
    @if ($category->background)

        <picture>
            <source srcset="{{ ImageHelper::thumb($category->background, 'webp', 1600, 400, '', 100) }}"
                media="(min-width: 768px)" type="image/webp">
            <source srcset="{{ ImageHelper::thumb($category->background, 'webp', 800, 400, '', 100) }}"
                media="(max-width: 768px)" type="image/webp">
            <source srcset="{{ ImageHelper::thumb($category->background, 'webp', 400, 200, '', 100) }}"
                media="(max-width: 500px)" type="image/webp">

            <source srcset="{{ ImageHelper::thumb($category->background, 'jpg', 1600, 400, '', 100) }}"
                media="(min-width: 768px)" type="image/jpeg">
            <source srcset="{{ ImageHelper::thumb($category->background, 'jpg', 400, 200, '', 100) }}"
                media="(max-width: 768px)" type="image/jpeg">
            <img src="{{ asset('img/1.jpg') }}" alt="хлебные крошки">
        </picture>
    @else
        <picture>
            <source srcset="{{ ImageHelper::thumb('1.jpg', 'webp', 1600, 400, '', 100) }}" media="(min-width: 768px)"
                type="image/webp">
            <source srcset="{{ ImageHelper::thumb('1.jpg', 'webp', 800, 400, '', 100) }}" media="(min-width: 768px)"
                type="image/webp">
            <source srcset="{{ ImageHelper::thumb('1.jpg', 'webp', 400, 200, '', 100) }}" media="(max-width: 500px)"
                type="image/webp">
            <source srcset="{{ ImageHelper::thumb('1.jpg', 'jpg', 1600, 400, '', 100) }}" media="(min-width: 768px)"
                type="image/jpeg">
            <source srcset="{{ ImageHelper::thumb('1.jpg', 'jpg', 800, 400, '', 100) }}" media="(min-width: 768px)"
                type="image/jpeg">
            <source srcset="{{ ImageHelper::thumb('1.jpg', 'jpg', 400, 200, '', 100) }}" media="(max-width: 500px)"
                type="image/jpeg">
            <img src="{{ asset('img/1.jpg') }}" alt="хлебные крошки">
        </picture>
    @endif
@endsection

@section('name')
    {{ $category->title }}
@endsection

@section('description')
    @if ($category->description)
        <div class="breadcrumbs__desc">
            {{ $category->description }}
        </div>
    @endif
@endsection
{{-- SEO --}}
@section('seo_title')
    @if ($category->seo_title)
        {{ $category->seo_title }}
    @else
        {{ $category->title }}
    @endif
@endsection

@section('seo_description')
    @if ($category->seo_description)
        {{ $category->seo_description }}
    @else
        {{ $category->description }}
    @endif
@endsection

@section('content')
    <main>
        <?php $post = $category; ?>
        @include('components.breadcrumbs')
        @include('components.text_block_1')
        @include('components.productionmain_block')
        @include('components.text_block_2')
    </main>
@endsection
