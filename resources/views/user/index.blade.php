@extends('layouts.app')

<!-- Page d'utilisateur -->

@section('content')
    <section>
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
            <div class="w-full bg-white md:mt-0 sm:max-w-7/12 xl:p-0">
                <h1 class="text-center text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                    Bonjour {{$user->name}}, bienvenue parmi nous ! 🍕
                </h1>
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <form method="post" action="{{route("user.edit")}}" class="space-y-4 md:space-y-6">
                        @csrf
                        @method('PATCH')

                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="name">Nom</label>
                            <input id="text"
                                   class="bg-gray-300 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                   name="name"
                                   placeholder="{{$user->name}}"
                                   type="text">
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="email">Adresse mail</label>
                            <input id="email"
                                   class="bg-gray-300 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                   name="email"
                                   placeholder="{{$user->email}}"
                                   type="email">
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="address">Adresse de
                                livraison</label>
                            <input id="address"
                                   class="bg-gray-300 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                   name="address"
                                   placeholder="{{$user->address}}"
                                   type="text">
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="password">Mot de
                                passe</label>
                            <input id="password"
                                   class="bg-gray-300 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                   name="password"
                                   placeholder="********"
                                   type="password">
                        </div>

                        <button
                            class="bg-yellow-500 w-full text-white hover:bg-red-600 font-medium focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg text-sm px-5 py-2.5 text-center"
                            type="submit">
                            Mettre à jour
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
