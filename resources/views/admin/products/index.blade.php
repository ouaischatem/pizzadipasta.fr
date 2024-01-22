@extends('admin.dashboard')

<!-- Permet d'afficher les produts avec les actions possibles -->
@section('content')
    <div class="container">
        <div class="flex justify-between">
            <h1 class="text-3xl font-medium text-gray-700">Produits</h1>
            <a href="{{ route("admin.product.create")}}"
               class="text-white focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 bg-[#3b7ddd] hover:bg-[#316abc] focus:outline-none focus:ring-blue-800">Nouveau
                Produit</a>
        </div>
        <div class="flex flex-col mt-8">
            <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div
                    class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                    <table class="min-w-full">
                        <thead>
                        <tr>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-900 uppercase border-b border-gray-200 bg-gray-50">
                                #
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-900 uppercase border-b border-gray-200 bg-gray-50">
                                Titre
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-900 uppercase border-b border-gray-200 bg-gray-50">
                                Image
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-900 uppercase border-b border-gray-200 bg-gray-50">
                                Prix
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-900 uppercase border-b border-gray-200 bg-gray-50">
                                Type
                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-900 uppercase border-b border-gray-200 bg-gray-50">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr class="{{ $loop->index % 2 == 0 ? 'bg-gray-100' : 'bg-white' }}">
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 font-sans text-gray-600">{{$product->id}}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 font-sans text-gray-600">{{$product->title}}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <img class="w-25 h-16"
                                         src="{{ url('storage/product_images/' . basename($product->image)) }}"
                                         alt="Post Image">
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 font-sans text-gray-600">{{$product->price}}€</div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    @php
                                        $categoryIcons = [
                                            'drink' => 'drink-icon.png',
                                            'dessert' => 'dessert-icon.png',
                                            'pizza' => 'pizza-icon.png',
                                        ];
                                    @endphp

                                    <img class="w-16 h-16"
                                         src="{{ asset($categoryIcons[$product->category] ?? 'pizza-icon.png') }}"
                                         alt="Category icon">
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="flex justify-center">
                                        <a href="{{ route('admin.product.edit', ['id' => $product->id]) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-blue-600">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                                            </svg>
                                        </a>
                                        <a href="{{ route('admin.product.delete', ['id' => $product->id]) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-blue-600">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Pagination -->
        {{ $products->links() }}
    </div>
@endsection
