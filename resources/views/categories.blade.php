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


@section('content')
   
        <?php $post = $category; ?>
        @include('components.breadcrumbs')




        @include('components.parent_services')


        @include('components.text_block_1')

        @include('components.children_services')


        @include('components.text_block_2')


 
@endsection
