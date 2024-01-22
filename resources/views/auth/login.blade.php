@extends('layouts.app')

@section('content')
    <div class="container flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
        <div class="w-full bg-white md:mt-0 sm:max-w-7/12 xl:p-0">
            <h1 class="text-center text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                Connexion
            </h1>
            <div class="space-y-4 md:space-y-6 sm:p-8">
                <form action="{{ route('login') }}" method="POST" class="space-y-4 md:space-y-6">
                    @csrf
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="email">Adresse mail</label>
                        <input id="email"
                               class="form-control @error('email') is-invalid @enderror bg-gray-300 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                               name="email"
                               value="{{ old('email') }}"
                               required autocomplete="email" autofocus
                               placeholder="name@pizzadipasta.fr"
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
                               name="password"
                               placeholder="•••••••••••••"
                               required autocomplete="current-password"
                               type="password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" aria-describedby="remember"
                                       class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300"
                                       type="checkbox"
                                    {{ old('remember') ? 'checked' : '' }}>
                            </div>
                            <div class="ml-3 text-sm">
                                <label class="text-gray-500" for="remember">Se souvenir de moi</label>
                            </div>
                        </div>
                        <a class="text-sm font-medium text-primary-600 hover:underline hover:cursor-pointer"
                           href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                    </div>
                    <button
                        class="bg-yellow-500 w-full text-white hover:bg-red-600 font-medium focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg text-sm px-5 py-2.5 text-center"
                        type="submit">
                        SE CONNECTER
                    </button>
                    <p class="text-sm font-light text-gray-500">
                        Vous n'avez pas encore de compte ? <a
                            class="font-medium text-primary-600 hover:underline hover:cursor-pointer"
                            href="{{ route('register') }}">Créer une compte</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
@endsection

