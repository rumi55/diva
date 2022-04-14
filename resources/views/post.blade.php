@extends('layouts.main')
@section('background')
    @if ($post->background)
        <picture>
            <source srcset="{{ ImageHelper::thumb($post->background, 'webp', 1600, 400, '', 100) }}"
                media="(min-width: 768px)" type="image/webp">
            <source srcset="{{ ImageHelper::thumb($post->background, 'webp', 800, 400, '', 100) }}"
                media="(max-width: 768px)" type="image/webp">
            <source srcset="{{ ImageHelper::thumb($post->background, 'webp', 400, 200, '', 100) }}"
                media="(max-width: 500px)" type="image/webp">

            <source srcset="{{ ImageHelper::thumb($post->background, 'jpg', 1600, 400, '', 100) }}"
                media="(min-width: 768px)" type="image/jpeg">
            <source srcset="{{ ImageHelper::thumb($post->background, 'jpg', 400, 200, '', 100) }}"
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
    {{ $post->title }}
@endsection
@section('description')
    @if ($post->description)
        <div class="breadcrumbs__desc">
            {!! $post->description !!}
        </div>
    @endif
@endsection
{{-- SEO --}}
@section('seo_title')
    @if ($post->seo_title)
        {{ $post->seo_title }}
    @else
        {{ $post->title }}
    @endif
@endsection

@section('seo_description')
    @if ($post->seo_description)
        {{ $post->seo_description }}
    @else
        {{ $post->description }}
    @endif
@endsection

@section('content')
    <main>

        @include('components.breadcrumbs')



        @forelse ($post->blocks->where('type', 'products') as $item)
            @include('components.production_block')
        @empty
        @endforelse


        @forelse ($post->blocks->where('type', 'about') as $item)
            @include('components.about_block')
        @empty
        @endforelse
        @if ($post->type == 'contacts')
            @include('components.company_cards')
        @else
            @include('components.text_block_1')
        @endif



        @forelse ($post->blocks->where('type', 'team_full') as $item)
            @include('components.team')
        @empty
        @endforelse

        @forelse ($post->blocks->where('type', 'factors') as $item)
            @include('components.factors_block')
        @empty
        @endforelse


        @forelse ($post->blocks->where('type', 'map_production') as $item)
            @include('components.map_production_block')
        @empty
        @endforelse



        @include('components.text_block_2')

        @forelse ($post->blocks->where('type', 'experience') as $item)
            @include('components.experience_block')
        @empty
        @endforelse




        @forelse ($post->blocks->where('type', 'logo') as $item)
            @include('components.logo_block')
        @empty
        @endforelse
        @include('components.gallery_block')
        @forelse ($post->blocks->where('type', 'stages') as $item)
            @include('components.stages_block')
        @empty
        @endforelse
        @include('components.text_block_3')
    </main>
@endsection
