@extends('layouts.app')

<!-- Permet d'afficher les pizza disponible à la vente -->
@section('content')
    <section
        class="w-fit mx-auto grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 justify-items-center justify-center gap-8 mt-10 mb-5">

        @foreach($products as $product)
            <div class="w-96 bg-white shadow-md rounded-xl">
                <img alt="Product Image" class="h-56 w-96 object-cover rounded-t-xl"
                     src="{{ asset('storage/product_images/' . basename($product->image)) }}"/>
                <div class="px-4 py-3 w-96">
                    <p class="text-lg font-bold text-black truncate block capitalize">{{$product->title}}
                        <span
                            class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded uppercase">Disponible</span>
                    </p>
                    <span class="text-gray-400 mr-3 uppercase text-xs">{{$product->description}}</span>
                    <div class="flex items-center mt-5">
                        <p class="text-lg font-semibold text-black cursor-auto">{{$product->price}} €</p>
                        <div class="ml-auto">

                            <a href="{{ $product->category == 'pizza' ? route('product.show', ['id' => $product->id]) : route('order.add', ['id' => $product->id]) }}"
                               class="uppercase text-white bg-yellow-500 hover:bg-red-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none hover:cursor-pointer">
                                <img alt="Cart icon" class="cart-icon-white-container inline-block"
                                     src="{{ asset("add-cart.svg") }}">
                                Ajouter
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
@endsection
