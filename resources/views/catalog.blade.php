@extends('layouts.main')



@section('background')
    @if ($category->background)
        <img src="storage/{{ $category->background }}" alt="">
    @else
        <img src="{{ asset('img/1.jpg') }}" alt="">
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
