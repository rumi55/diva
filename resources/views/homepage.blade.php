@extends('layouts.main')

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

    @include('components.photo_block')
    {{-- @include('components.slider') --}}
    @include('components.logo_block')
    @include('components.services_main')
    @include('components.map_block')



    {{-- <script>
        const slides = document.querySelectorAll(".slide");
        const next = document.querySelector("#next");
        const prev = document.querySelector("#prev");
        const auto = false;
        const intervalTime = 5000;
        let slideInterval;

        const nextSlide = () => {
            const current = document.querySelector(".current");
            current.classList.remove("current");
            if (current.nextElementSibling) {
                current.nextElementSibling.classList.add("current");
            } else {
                slides[0].classList.add("current");
            }
            setTimeout(() => current.classList.remove("current"));
        };

        const prevSlide = () => {
            const current = document.querySelector(".current");
            current.classList.remove("current");
            if (current.previousElementSibling) {
                current.previousElementSibling.classList.add("current");
            } else {
                slides[slides.length - 1].classList.add("current");
            }
            setTimeout(() => current.classList.remove("current"));
        };

        next.addEventListener("click", e => {
            nextSlide();
            if (auto) {
                slideInterval = setInterval(nextSlide, intervalTime);
                clearInterval(slideInterval);
            }
        });

        prev.addEventListener("click", e => {
            prevSlide();
            if (auto) {
                slideInterval = setInterval(nextSlide, intervalTime);
                clearInterval(slideInterval);
            }
        });

        if (auto) {
            slideInterval = setInterval(nextSlide, intervalTime);
        }
    </script> --}}
@endsection