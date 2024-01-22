@extends('admin.dashboard')

<!-- Permet la création d'un poste -->
@section('content')
    <h1 class="text-3xl font-medium text-gray-700">Création utilisateur</h1>
    <div class="container mx-auto mt-10 bg-white p-3">
        @if ($errors->any())
            <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <div>
                    <span class="font-medium">Assurez-vous que ces exigences sont remplies :</span>
                    <ul class="mt-1.5 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <form method="post" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium font-sans text-gray-600" for="title">Nom </label>
                <input id="name"
                       class="border border-gray-300 font-sans text-gray-600 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                       name="name"
                       placeholder="name"
                       type="text">
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium font-sans text-gray-600" for="description">Email </label>
                <input id="email"
                       class="border border-gray-300 font-sans text-gray-600 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                       name="email"
                       placeholder="Email"
                       type="email">
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium font-sans text-gray-600" for="address">Adresse de
                    livraison </label>
                <input id="address"
                       class="border border-gray-300 font-sans text-gray-600 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                       name="address"
                       placeholder="Adresse de livraison"
                       type="text">
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium font-sans text-gray-600" for="description">Mot de
                    passe </label>
                <input id="password"
                       class="border border-gray-300 font-sans text-gray-600 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                       name="password"
                       placeholder="**********"
                       type="password">
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium font-sans text-gray-600" for="role">Rôle</label>
                <select id="role" name="role"
                        class="border border-gray-300 font-sans text-gray-600 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    <option value="user">Utilisateur</option>
                    <option value="admin">Administrateur</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Publier</button>
        </form>
    </div>

    <script src="https://htmeditor.com/js/htmeditor.min.js" htmeditor_textarea="htmeditor"></script>
@endsection
