@extends('admin.dashboard')

<!-- Permet la création d'un poste -->
@section('content')
    <h1 class="text-3xl font-medium text-gray-700">Création poste</h1>
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

        <form method="post" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium font-sans text-gray-600" for="title">Titre du
                    poste </label>
                <input id="title"
                       class="border border-gray-300 font-sans text-gray-600 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                       name="title"
                       placeholder="Titre"
                       type="text">
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium font-sans text-gray-600" for="description">Description du
                    poste </label>
                <input id="description"
                       class="border border-gray-300 font-sans text-gray-600 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                       name="description"
                       placeholder="Description"
                       type="text">
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium font-sans text-gray-600" for="image">Nouvelle image</label>
                <input type="file" name="image" id="image"
                       class="border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full bg-white">
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium font-sans text-gray-600" for="content">Contenu du
                    poste</label>
                <textarea id="htmeditor" name="content"></textarea>
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium font-sans text-gray-600" for="quote">Citation du
                    poste </label>
                <textarea id="quote"
                          class="break-words border border-gray-300 font-sans text-gray-600 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 pb-16"
                          name="quote"
                          placeholder="Citation" type="text"></textarea>
            </div>

            <div class="mb-4">
                <label class="flex items-center">
                    <input type="checkbox" name="visible" class="form-checkbox" checked>
                    <span class="ml-2 text-sm font-medium font-sans text-gray-600">Rendre visible</span>
                </label>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Publier</button>
        </form>
    </div>

    <script src="https://htmeditor.com/js/htmeditor.min.js" htmeditor_textarea="htmeditor"></script>
@endsection
