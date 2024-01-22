@extends('layouts.app')

@section('content')
    <div class="container mx-auto my-10">
        <div class="lg:col-gap-12 xl:col-gap-16 mt-8 grid grid-cols-1 gap-12 lg:mt-12 lg:grid-cols-5 lg:gap-16">
            <div class="lg:col-span-3 lg:row-end-1">
                <div class="lg:flex lg:items-start">
                    <div class="lg:order-2 lg:ml-5">
                        <div class="max-w-xl overflow-hidden rounded-lg">
                            <img class="h-full w-full max-w-full object-cover"
                                 src="{{ asset('storage/product_images/' . basename($product->image)) }}" alt=""/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-4 lg:row-span-2 lg:row-end-2">
                <h1 class="sm: text-2xl font-bold text-gray-900 sm:text-3xl">{{ $product->title }}</h1>

                <div class="mt-5 flex items-center">
                    <p class="text-sm font-medium text-gray-500">{{ $product->description }}</p>
                </div>

                <form action="{{ route('order.add', ['id' => $product->id]) }}" method="POST">
                    @csrf

                    <h2 class="mt-8 text-base text-gray-900">Taille</h2>
                    <div class="mt-3 flex select-none flex-wrap items-center gap-1">
                        @foreach($formats as $format)
                            <label>
                                <input type="radio" name="size" value="{{ $format->size }}" class="peer sr-only"/>
                                <span
                                    class="peer-checked:bg-black peer-checked:text-white rounded-lg border border-black px-6 py-2 font-bold">
                                    {{$format->size}}</span>
                                <span class="mt-2 block text-center text-xs">{{ $format->price }}€</span>
                            </label>
                        @endforeach
                    </div>

                    <h2 class="mt-8 text-base text-gray-900">Suppléments</h2>
                    <div class="mt-3 flex select-none flex-wrap items-center gap-1">
                        @foreach($toppings as $topping)
                            <label class="pt-2">
                                <input type="checkbox" name="topping_ids[]" value="{{ $topping->id }}"
                                       class="peer sr-only"/>
                                <span
                                    class="peer-checked:bg-black peer-checked:text-white rounded-lg border border-black px-6 py-2 font-bold">{{ $topping->name }}</span>
                                <span class="mt-3 block text-center text-xs">{{ $topping->price }}€</span>
                            </label>
                        @endforeach
                    </div>

                    <div
                        class="mt-10 flex flex-col items-center justify-between space-y-4 border-t border-b py-4 sm:flex-row sm:space-y-0">
                        <div class="flex items-end">
                            <ul>
                                <li class="flex items-center text-left text-sm font-medium text-gray-600">
                                    <svg class="mr-2 block h-5 w-5 align-middle text-gray-500"
                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                              class=""></path>
                                    </svg>
                                    Livraison rapide
                                </li>

                                <li class="flex items-center text-left text-sm font-medium text-gray-600">
                                    <svg class="mr-2 block h-5 w-5 align-middle text-gray-500"
                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"
                                              class=""></path>
                                    </svg>
                                    Paiement sécurisé
                                </li>
                            </ul>
                        </div>

                        <button type="submit"
                                class="inline-flex items-center justify-center px-12 py-3 text-center uppercase text-white bg-yellow-500 hover:bg-red-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm focus:outline-none hover:cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="shrink-0 mr-3 h-5 w-5" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                            Ajouter
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
