@extends('layouts.app')

<!-- Permet d'afficher et de développer un poste en particulier -->
@section('content')
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
        <div class="w-full bg-white md:mt-0 sm:max-w-7/12 xl:p-0">
            <div class="overflow-hidden border-t border-white/25">
                <a class="mt-10 text-red-600 font-extrabold" href="{{ route('posts') }}">
                    < RETOUR AU BLOG
                </a>
                <h3 class="mt-5 text-4xl font-semibold text-gray-900">
                    {{$post->title}}
                </h3>
                <h3 class="text-xm font-light text-gray-900">
                    Publié le {{ strtolower($post->created_at->format('d F Y')) }}
                </h3>
                <img alt="Post {{$post->id}}"
                     class="object-cover w-full h-50 mt-5 shadow-lg rounded-xl"
                     src="{{ asset('storage/post_images/' . basename($post->image)) }}">
                <div class="flex items-center mt-4 gap-y-3 gap-x-5">
                    <div>
                        <div class="mt-3">
                            {!! $post->content !!}
                        </div>
                        <div class="mt-10 text-xl border-l-4 border-red-500 italic my-8 pl-8 md:pl-12">
                            {{ $post->quote  }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
