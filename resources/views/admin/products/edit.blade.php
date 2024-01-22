@extends('admin.dashboard')

<!-- Permet la modification d'un produit -->
@section('content')
    <h1 class="text-3xl font-medium text-gray-700">Modification produit</h1>
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

        <form method="post" action="{{ route('admin.product.edit', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium font-sans text-gray-600" for="title">Nom </label>
                <input id="title"
                       class="border border-gray-300 font-sans text-gray-600 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                       name="title"
                       placeholder="Titre"
                       type="text"
                       value="{{$product->title}}">
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium font-sans text-gray-600" for="title">Description </label>
                <input id="description"
                       class="border border-gray-300 font-sans text-gray-600 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                       name="description"
                       placeholder="Description"
                       type="text"
                       value="{{$product->description}}">
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium font-sans text-gray-600" for="image">Nouvelle image</label>
                <input type="file" name="image" id="image"
                       class="border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full ">
                <img class="pt-2 max-h-64 mb-2" src="{{ url('storage/product_images/' . basename($product->image)) }}"
                     alt="Product image">
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium font-sans text-gray-600" for="description">Prix</label>
                <input id="price"
                       class="border border-gray-300 font-sans text-gray-600 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                       name="price"
                       placeholder="Prix"
                       type="number"
                       step="0.01"
                       value="{{$product->price}}">
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium font-sans text-gray-600" for="role">Catégorie</label>
                <select id="category" name="category"
                        class="border border-gray-300 font-sans text-gray-600 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    <option value="dessert" {{ $product->category === 'dessert' ? 'selected' : '' }}>Dessert</option>
                    <option value="drink" {{ $product->category === 'drink' ? 'selected' : '' }}>Boisson</option>
                    <option value="pizza" {{ $product->category === 'pizza' ? 'selected' : '' }}>Pizza</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Sauvegarder
            </button>
        </form>
    </div>
@endsection
