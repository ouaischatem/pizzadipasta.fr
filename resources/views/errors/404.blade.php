@extends('layouts.app')

<!-- Page affiché lors d'une erreur 404 -->
@section('content')
    <div class="flex items-center justify-center">
        <div class="container text-center space-y-8">
            <h1 class="text-4xl md:text-6xl text-gray-900">
                404
            </h1>
            <h1 class="text-xl md:text-xl text-gray-500 font-sans">
                La page demandée est introuvable.
            </h1>
            <div>
                <a class="text-white text-xl bg-yellow-500 hover:bg-red-600 font-medium rounded-3xl px-10 py-5 text-center ml-2 mb-2 hover:cursor-pointer"
                   href="/">
                    ACCUEIL
                </a>
            </div>
        </div>
    </div>
@endsection

