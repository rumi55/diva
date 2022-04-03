@extends('layouts.main')
@section('background')
    @if ($post->background)
        <img src="storage/{{ $post->background }}" alt="">
    @else

    <picture>
        <source srcset="{{ ImageHelper::thumb('1.jpg', 'webp', 1600, 400, '', 100) }}" type="image/webp">
        <source srcset="{{ ImageHelper::thumb('1.jpg', 'jpg', 1600, 400, '', 100) }}" type="image/jpeg">
        <img src="{{ asset('img/1.jpg') }}" alt="хлебные крошки">
      </picture>
        {{-- <img src="{{ asset('img/1.jpg') }}" alt=""> --}}
        {{-- <img src="{{ ImageHelper::thumb('storage' . '/' . '1.jpg', 'webp', 1600, 400, '', 100) }}" alt=""> --}}
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

        @include('components.text_block_1')


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
