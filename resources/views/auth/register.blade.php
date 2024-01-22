@extends('layouts.app')

@section('content')

    <div class="container flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
        <div class="w-full bg-white md:mt-0 sm:max-w-7/12 xl:p-0">
            <h1 class="text-center text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                Inscription
            </h1>
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <form method="POST" action="{{ route('register') }}" class="space-y-4 md:space-y-6">
                    @csrf
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="name">Nom</label>
                        <input id="name"
                               class="form-control @error('name') is-invalid @enderror bg-gray-300 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                               name="name"
                               placeholder="Elon MUSK"
                               type="text"
                               value="{{ old('name') }}"
                               required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                class="font-medium">ERREUR !</span> {{ $message }}</p>
                                    </span>
                        @enderror
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="email">Adresse mail</label>
                        <input id="email"
                               class="form-control @error('email') is-invalid @enderror bg-gray-300 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                               name="email"
                               placeholder="name@pizzadipasta.fr"
                               value="{{ old('email') }}"
                               required autocomplete="email"
                               type="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                class="font-medium">ERREUR !</span> {{ $message }}</p>
                                    </span>
                        @enderror
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 " for="password">Mot de passe</label>
                        <input id="password"
                               class="form-control @error('password') is-invalid @enderror bg-gray-300 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                               name="password" placeholder="•••••••••••••"
                               required autocomplete="new-password"
                               type="password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                class="font-medium">ERREUR !</span> {{ $message }}</p>
                                    </span>
                        @enderror
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 " for="password-confirm">Confirmation
                            du mot de
                            passe</label>
                        <input id="password-confirm"
                               class="bg-gray-300 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                               placeholder="•••••••••••••"
                               name="password_confirmation"
                               required autocomplete="new-password"
                               type="password">
                    </div>
                    <button
                        class="bg-yellow-500 w-full text-white hover:bg-red-600 font-medium focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg text-sm px-5 py-2.5 text-center"
                        type="submit">
                        CRÉER UN COMPTE
                    </button>
                    <p class="text-sm font-light text-gray-500">
                        Vous avez déjà un compte ? <a
                            class="font-medium text-primary-600 hover:underline hover:cursor-pointer"
                            href="{{ route('login') }}">Se
                            connecter</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
@endsection
