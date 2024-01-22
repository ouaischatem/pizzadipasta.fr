@extends('layouts.app')

<!-- Contenu de la page d'accueil -->
@section('content')
    <section class="p-4 max-w-screen-xl mx-auto flex flex-col md:flex-row md:space-x-8 md:space-y-0">
        <div class="pt-20 text-center md:text-left space-y-8 md:w-1/2 md:mb-0">
            <h1 class="text-4xl md:text-6xl text-gray-900">
                Mentions légales
            </h1>
            <h1 class="text-xl md:text-4xl text-gray-500 font-sans">
                Éditeur du site
            </h1>
            <div>
                <a class="text-red-600 md:text-3xl">PizzaDiPasta</a> <br>
                <strong>Adresse</strong> : 3 rue Maréchal Joffre, 44000 Nantes <br>
                <strong>Capital social</strong> : 200 000€ <br>
                <strong>Adresse e-mail</strong> : pizzadipasta@pdp.fr <br>
            </div>
        </div>
        <div class="pb-28 md:w-1/2">
            <img alt="Food Image" class="mx-auto animate-spin-slow" src=" {{asset('pizza-present.png')}} ">
        </div>
    </section>

    <section class="bg-[#f5e6c4]">
        <img alt="Background top" class="bg-[#f5e6c4] w-full" src=" {{asset('bg-top.png')}} ">
        <div class="relative">
            <div class="px-4 py-10 mx-auto sm:px-6 lg:px-8 lg:py-14 max-w-7xl">
                <div class="relative text-center max-w-2xl mx-auto">
                    <h1 class="block mx-auto text-3xl font-bold text-gray-900 truncate md:text-5xl"><span
                            class="relative z-50">Responsable de publication</span></h1> <br>
                    <h1 class="text-xl md:text-4xl text-red-500 font-sans">
                        Jeromi Rossi
                    </h1>
                    <h1 class="text-xl md:text-2xl text-gray-500 font-sans">
                        jeromi.rossi@pdp.fr
                    </h1>
                </div>
            </div>
        </div>
        <img alt="Background bottom" class="bg-[#f5e6c4] w-full" src=" {{asset('bg-bottom.png')}} ">
    </section>

    <section class="p-4 items-center pt-20 max-w-screen-xl mx-auto flex flex-col md:flex-row md:space-x-8 md:space-y-0">
        <div class="text-center md:text-left space-y-8 md:w-1/2 md:mb-0">
            <h1 class="text-4xl md:text-6xl text-gray-900">
                Hébergement du site
            </h1>
            <h1 class="text-xl md:text-xl text-gray-500 font-sans">
                Le site web de PizzaDiPasta est hébergé par <strong>OVH</strong> <br>
                <strong>Adresse</strong> : 2 rue Kellermann - 59100 Roubaix <br>
                <strong>Contact service client</strong> : 1007 <br>
            </h1>
            <div class="pb-10">
                <a class="text-white text-xl bg-yellow-500 hover:bg-red-600 font-medium rounded-3xl px-10 py-5 text-center ml-2 mb-2 inline-block hover:cursor-pointer"
                   href="https://www.ovhcloud.com">
                    EN SAVOIR PLUS
                </a>
            </div>
        </div>
        <div class="mb-4 md:w-1/2">
            <img alt="Food Image" class="w-7/12 mx-auto" src="{{ asset('ovhcloud-logo.png') }}">
        </div>
    </section>

    <section class="relative bg-[#f5e6c4]">
        <img alt="Background top" class="bg-[#f5e6c4] w-full" src=" {{asset('bg-top.png')}} ">
        <div class="pt-5 w-full">
            <div class="mx-auto max-w-5xl">
                <div class="relative text-center max-w-2xl mx-auto">
                    <h1 class="block mx-auto text-3xl font-bold text-gray-900 md:text-5xl"><span
                            class="relative z-50">Propriété intellectuelle</span></h1> <br>
                    <h1 class="text-xl md:text-xl text-gray-500 font-sans">
                        Tous les éléments constituant le site web de PizzaDiPasta, incluant mais non limité aux textes,
                        images, logos, graphiques, et autres contenus, sont la propriété exclusive de PizzaDiPasta
                        ou sont utilisés avec les autorisations nécessaires. Toute reproduction, représentation,
                        modification, publication ou adaptation, partielle ou intégrale, du site et de son contenu,
                        est strictement interdite sans l'autorisation préalable et écrite de PizzaDiPasta.
                    </h1> <br>
                    <h1 class="block mx-auto text-3xl font-bold text-gray-900 md:text-5xl"><span
                            class="relative z-50">Images du site</span></h1> <br>
                    <h1 class="text-xl md:text-xl text-gray-500 font-sans">
                        Les images utilisées sur le site web de PizzaDiPasta peuvent être soumises à des droits d'auteur
                        appartenant à des tiers. Toutes les images utilisées sur le site sont soit la propriété de
                        PizzaDiPasta,
                        soit utilisées avec les consentements appropriés ou sous licence. Toute utilisation non
                        autorisée
                        des images du site peut constituer une violation des lois sur le droit d'auteur,
                        des marques déposées ou d'autres lois applicables, et peut entraîner des poursuites judiciaires.
                    </h1>
                </div>
                <div class="relative grid gap-10 sm:grid-cols-2 lg:grid-cols-3 justify-center">
                    <div
                        class="overflow-hidden group relative transform scale-100 transition-transform hover:scale-110">
                        <a href="{{ route("order") }}">

                    </div>
                </div>
            </div>
            <img alt="Background bottom" class="bg-[#f5e6c4] w-full" src=" {{asset("bg-bottom.png")}} ">
    </section>
@endsection
