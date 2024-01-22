@extends('layouts.app')

<!-- Permet d'afficher les postes visibles -->
@section('content')
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
        <div class="w-full bg-white md:mt-0 sm:max-w-7xl xl:p-0">
            <div class="pt-10 relative text-left max-w-2xl">
                <h1 class="block mx-auto text-3xl font-bold text-gray-900 truncate md:text-5xl"><span
                        class="relative z-50">Dernières actualités</span></h1>
            </div>
            <div class="pt-4 relative grid gap-6 sm:grid-cols-1 lg:grid-cols-1">
                @foreach($posts as $post)
                    <div class="bg-white shadow-md rounded-xl">
                        <img class="object-cover h-64 w-full rounded-t-xl"
                             src="{{ asset('storage/post_images/' . basename($post->image)) }}" alt="Post Image">
                        <div class="px-4 py-3">
                            <div class="flex items-center gap-y-3 gap-x-5">
                                <div>
                                    <h3 class="text-2xl font-semibold text-gray-900">
                                        {{$post->title}}
                                    </h3>
                                    <h3 class="mt-2 text-xs text-gray-500 font-sans">
                                        Publié le {{ strtolower($post->created_at->format('d F Y')) }}
                                    </h3>
                                    <p class="mt-2 text-sm font-sans text-periwinkle line-clamp-2">
                                        {{$post->description}}
                                    </p>

                                    <div class="mt-3">
                                        <a class="text-red-600" href="{{ route('posts.show', ['id' => $post->id]) }}">
                                            Lire la suite...
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Pagination -->
            {{ $posts->links() }}
        </div>
    </div>
@endsection
