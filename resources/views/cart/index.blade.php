@extends('layouts.app')

<!-- Permet d'afficher le panier de l'utilisateur -->
@section('content')
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
        <div class="w-full bg-white md:mt-0 sm:max-w-7/12 xl:p-0">
            <h1 class="text-center text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                Votre Panier
            </h1>
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <form action="#" class="space-y-4 md:space-y-6">
                    <div class="flow-root">
                        @php
                            $totalPrice = 0;
                        @endphp
                        @foreach($cartProducts as $cartProduct)
                            @php
                                $productTotalPrice = $cartProduct->product->price;
                            @endphp
                            <ul class="-my-8">
                                <div class="mt-6 border-t border-b"></div>
                                <li class="flex flex-col space-y-3 py-6 text-left sm:flex-row sm:space-x-5 sm:space-y-0">
                                    <div class="shrink-0">
                                        <img alt="" class="h-24 w-24 max-w-full rounded-lg object-cover"
                                             src="{{ asset('storage/product_images/' . basename($cartProduct->product->image)) }}"/>
                                    </div>

                                    <div class="relative flex flex-1 flex-col justify-between">
                                        <div class="sm:col-gap-5 sm:grid sm:grid-cols-2">
                                            <div class="pr-8 sm:pr-5">
                                                <p class="text-base font-semibold text-gray-900">{{$cartProduct->product->title}}
                                                    ({{$cartProduct->product->price}}€)</p>
                                                @if($cartProduct->product->category == 'pizza')
                                                    <p class="text-gray-400 mr-3 uppercase text-xs">{{$cartProduct->format->size}}
                                                        ({{$cartProduct->format->price}}€)</p>
                                                    @foreach($cartProduct->toppings as $topping)
                                                        <div>
                                                            <p class="text-gray-400 mr-3 uppercase text-xs">{{$topping->name}}
                                                                ({{$topping->price}}€)</p>
                                                            @php
                                                                $productTotalPrice += $topping->price;
                                                            @endphp
                                                        </div>
                                                    @endforeach
                                                @endif
                                                <div class="flex items-center border-gray-100">
                                                    <a href="{{ route('cart.decrease', ['id' => $cartProduct->id]) }}">
                                                        <span
                                                            class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50"> - </span>
                                                    </a>
                                                    <input
                                                        class="h-8 w-8 border bg-white text-center text-xs outline-none"
                                                        type="number" value="{{ $cartProduct->quantity }}" min="1"/>
                                                    <a href="{{ route('cart.increase', ['id' => $cartProduct->id]) }}">
                                                        <span
                                                            class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50"> + </span>
                                                    </a>
                                                </div>
                                            </div>

                                            <div
                                                class="mt-4 flex items-end justify-between sm:mt-0 sm:items-start sm:justify-end">
                                                <a href="{{ route('cart.remove', ['id' => $cartProduct->id]) }}">
                                                    <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                                         viewBox="0 0 24 24"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path class="" d="M6 18L18 6M6 6l12 12" stroke-linecap="round"
                                                              stroke-linejoin="round"
                                                              stroke-width="2"></path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="absolute top-0 right-0 flex sm:bottom-0 sm:top-auto">
                                            <p class="shrink-0 w-20 text-base font-semibold text-gray-900 sm:order-2 sm:ml-8 sm:text-right">
                                                @php
                                                    $productTotalPrice = ($productTotalPrice + $cartProduct->format->price) * $cartProduct->quantity;
                                                    $totalPrice += $productTotalPrice
                                                @endphp
                                                {{$productTotalPrice}} €
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @endforeach
                    </div>
                    <div class="mt-6 border-t border-b"></div>
                    <div class="mt-6 flex items-center justify-between">
                        <p class="text-sm font-medium text-gray-900">Total</p>
                        <p class="text-2xl font-semibold text-gray-900">{{$totalPrice}} €</p>
                    </div>

                    <button
                        class="bg-yellow-500 w-full text-white hover:bg-red-600 font-medium focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg text-sm px-5 py-2.5 text-center"
                        type="submit">
                        PAYER
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
