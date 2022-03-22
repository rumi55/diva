@extends('layouts.main')

@section('content')
    <main>
        @include('components.breadcrumbs')
        @include('components.about_block')
        @include('components.team')
        @include('components.experience')
        @include('components.logo')
    </main>
       
@endsection
