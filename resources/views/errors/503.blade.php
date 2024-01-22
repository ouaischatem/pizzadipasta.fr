@extends('layouts.app')

<!-- Page affiché lorsque le site est en maintenance. -->
@section('content')
    <div class="flex items-center justify-center">
        <div class="container text-center space-y-8">
            <img class="mx-auto mb-4 w-10 h-10" alt="Maintenance icon" src="{{  asset("maintenance.svg") }}">
            <h1 class="text-4xl md:text-6xl text-gray-900">
                En maintenance
            </h1>
            <h1 class="text-xl md:text-xl text-gray-500 font-sans">
                Nos administrateurs effectuent une maintenance planifiée, veuillez réessayez plus tard.
            </h1>
        </div>
    </div>
@endsection
