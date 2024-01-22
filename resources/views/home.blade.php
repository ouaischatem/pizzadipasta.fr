@extends('layouts.app')

<!-- Contenu de la page d'accueil -->
@section('content')
    <section class="p-4 max-w-screen-xl mx-auto flex flex-col md:flex-row md:space-x-8 md:space-y-0">
        <div class="pt-20 text-center md:text-left space-y-8 md:w-1/2 md:mb-0">
            <h1 class="text-4xl md:text-6xl text-gray-900">
                Élue meilleure<br/>Pizzeria basée<br/>à <a class="text-red-600">Nantes</a>
            </h1>
            <h1 class="text-xl md:text-xl text-gray-500 font-sans">
                Pizza Di Pasta est votre destination incontournable <br/>pour savourer les meilleures pizzas à Nantes.
            </h1>
            <div>
                <a class="text-white text-xl bg-yellow-500 hover:bg-red-600 font-medium rounded-3xl px-10 py-5 text-center ml-2 mb-2 inline-block hover:cursor-pointer"
                   href="{{ route("order") }}">
                    <img alt="Cart icon" class="cart-icon-white-container inline-block w-10"
                         src="{{ asset("cart-icon-white.svg")  }}">
                    COMMANDER
                </a>
            </div>
        </div>
        <div class="pb-28 md:w-1/2">
            <img alt="Food Image" class="mx-auto animate-spin-slow" src=" {{asset("pizza-present.png")}} ">
        </div>
    </section>

    <section class="mt-28 bg-[#f5e6c4]">
        <img alt="Background top" class="bg-[#f5e6c4] w-full" src=" {{asset("bg-top.png")}} ">
        <div class="relative">
            <div class="px-4 py-10 mx-auto sm:px-6 lg:px-8 lg:py-14 max-w-7xl">
                <div class="relative text-center max-w-2xl mx-auto">
                    <h1 class="block mx-auto text-3xl font-bold text-gray-900 truncate md:text-5xl"><span
                            class="relative z-50">BLOG</span></h1>
                    <h1 class="text-xl md:text-xl text-gray-500 font-sans">
                        Nos dernières actualités.
                    </h1>
                </div>
                <div class="relative grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

                    @foreach($posts as $post)
                        @if($loop->index < 3)
                            <div class="overflow-hidden border-t border-white/25">
                                <img alt="Post {{$post->id}}"
                                     class="object-cover w-full h-50 mt-5 shadow-lg rounded-xl"
                                     src="{{ asset('storage/post_images/' . basename($post->image)) }}">
                                <div class="flex items-center mt-4 gap-y-3 gap-x-5">
                                    <div>
                                        <h3 class="text-xl font-semibold text-gray-900">
                                            {{$post->title}}
                                        </h3>
                                        <h3 class="mt-2 text-xs text-gray-500 font-sans">
                                            Publié le {{ strtolower($post->created_at->format('d F Y')) }}
                                        </h3>
                                        <p class="mt-2 text-sm font-sans text-periwinkle line-clamp-2">
                                            {{$post->description}}
                                        </p>

                                        <a class="text-red-600" href="{{ route('posts.show', ['id' => $post->id]) }}">
                                            Lire la suite...
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @else
                            @break
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <img alt="Background bottom" class="bg-[#f5e6c4] w-full" src=" {{asset("bg-bottom.png")}} ">
    </section>

    <section class="p-4 items-center pt-20 max-w-screen-xl mx-auto flex flex-col md:flex-row md:space-x-8 md:space-y-0">
        <div class="text-center md:text-left space-y-8 md:w-1/2 md:mb-0">
            <h1 class="text-4xl md:text-6xl text-gray-900">
                Découvrez <br/> notre pizzeria
            </h1>
            <h1 class="text-xl md:text-xl text-gray-500 font-sans">
                Notre pizzeria est un endroit unique où vous pourrez déguster des pizzas savoureuses préparées avec des
                ingrédients frais et de qualité supérieure. Nous sommes passionnés par la création de pizzas délicieuses
                et
                nous nous engageons à offrir une expérience culinaire inoubliable à nos clients.
            </h1>
            <div class="pb-10">
                <a class="text-white text-xl bg-yellow-500 hover:bg-red-600 font-medium rounded-3xl px-10 py-5 text-center ml-2 mb-2 inline-block hover:cursor-pointer"
                   href="{{ route("info") }}">
                    EN SAVOIR PLUS
                </a>
            </div>
        </div>
        <div class="mb-4 md:w-1/2">
            <img alt="Food Image" class="w-7/12 mx-auto" src="{{ asset("pizzadipasta.png")  }}">
        </div>
    </section>

    <section class="relative bg-[#f5e6c4]">
        <img alt="Background top" class="bg-[#f5e6c4] w-full" src=" {{asset("bg-top.png")}} ">
        <div class="pt-5 w-full">
            <div class="mx-auto max-w-5xl">
                <div class="relative text-center max-w-2xl mx-auto">
                    <h1 class="block mx-auto text-3xl font-bold text-gray-900 truncate md:text-5xl"><span
                            class="relative z-50">SPÉCIALITÉS</span></h1>
                    <h1 class="text-xl md:text-xl text-gray-500 font-sans">
                        Les diverses pizza proposées.
                    </h1>
                </div>
                <div class="relative grid gap-10 sm:grid-cols-2 lg:grid-cols-3 justify-center">
                    <div
                        class="overflow-hidden group relative transform scale-100 transition-transform hover:scale-110">
                        <a href="{{ route("order") }}">
                            <img alt="Spécialité pizza 1"
                                 class="mt-5 shadow-lg rounded-full"
                                 src="{{ asset("speciality1.jpeg")  }}">
                        </a>
                        <h3 class="mt-6 text-center text-xl font-semibold text-gray-900">
                            MEXICAN GREEN WAVE
                        </h3>
                    </div>
                    <div
                        class="overflow-hidden group relative transform scale-100 transition-transform hover:scale-110">
                        <a href="{{ route("order") }}">
                            <img alt="Spécialité pizza 2"
                                 class="mt-5 shadow-lg rounded-full"
                                 src="{{ asset("speciality2.jpeg")  }}">
                        </a>
                        <h3 class="mt-6 text-center text-xl font-semibold text-gray-900">
                            DOUBLE CHEESE PIZZA
                        </h3>
                    </div>
                    <div
                        class="overflow-hidden group relative transform scale-100 transition-transform hover:scale-110">
                        <a href="{{ route("order") }}">
                            <img alt="Spécialité pizza 3"
                                 class="mt-5 shadow-lg rounded-full"
                                 src="{{ asset("speciality3.jpeg")  }}">
                        </a>
                        <h3 class="mt-6 text-center text-xl font-semibold text-gray-900">
                            MARGHERITA PIZZA
                        </h3>
                    </div>
                </div>
                <div class="pt-10 relative text-center max-w-2xl mx-auto">
                    <a
                        class="text-white text-xl bg-yellow-500 hover:bg-red-600 font-medium rounded-3xl px-10 py-5 text-center ml-2 mb-2 inline-block"
                        href="{{ route("order") }}">
                        VOIR LA CARTE
                    </a>
                </div>
            </div>
        </div>
        <img alt="Background bottom" class="bg-[#f5e6c4] w-full" src=" {{asset("bg-bottom.png")}} ">
    </section>
@endsection
