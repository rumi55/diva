@extends('layouts.main')

@section('content')
    <main>
        @include('components.breadcrumbs')
        @include('components.production_block')
        @include('components.map_production')
    </main>
       
@endsection