@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
        <div class="w-full bg-white md:mt-0 sm:max-w-7/12 xl:p-0">
            <h1 class="text-center text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                Réinitialisation de mot de passe
            </h1>
            <p class="pt-4 text-center text-gray-400 ">
                Après avoir soumis votre adresse e-mail, vous recevrez un e-mail de notre part avec les instructions
                pour changer votre mot de passe.
            </p>
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <form method="POST" action="{{ route('password.email') }}" class="space-y-4 md:space-y-6">
                    @csrf
                    <div>
                        <label
                            class="form-control @error('email') is-invalid @enderror block mb-2 text-sm font-medium text-gray-900"
                            for="email" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus>Adresse
                            mail</label>

                        <input id="email"
                               class="form-control @error('email') is-invalid @enderror bg-gray-300 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                               name="email"
                               placeholder="name@pizzadipasta.fr"
                               value="{{ old('email') }}"
                               required autocomplete="email" autofocus
                               type="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                class="font-medium">ERREUR !</span> {{ $message }}</p>
                                    </span>
                        @enderror
                    </div>
                    <button
                        class="bg-yellow-500 w-full text-white hover:bg-red-600 font-medium focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg text-sm px-5 py-2.5 text-center uppercase"
                        type="submit">
                        Réinitialiser
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
