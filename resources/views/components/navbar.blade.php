<!-- Composant navbar -->

<nav class="p-4 max-w-screen-xl flex flex-wrap items-center justify-between mx-auto">
    <a class="flex items-center hover:cursor-pointer" href="{{ url('/') }}">
        <img alt="Pizza Di Pasta Logo" class="h-32 mr-3 {{ request()->routeIs('cart') ? '' : 'animate-spin-slow' }}"
             src="{{ asset("pizzadipasta.png") }}">
    </a>
    <button aria-controls="navbar-default" aria-expanded="false"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
            data-collapse-toggle="navbar-default" type="button">
        <span class="sr-only">Open main menu</span>
        <svg aria-hidden="true" class="w-5 h-5" fill="none" viewBox="0 0 17 14"
             xmlns="http://www.w3.org/2000/svg">
            <path d="M1 1h15M1 7h15M1 13h15" stroke="currentColor" stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"/>
        </svg>
    </button>
    <div id="navbar-default" class="hidden w-full md:block md:w-auto text-xm">
        <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white">
            <li>
                @if (request()->routeIs('home'))
                    <a class="hover:cursor-pointer block py-2 pl-3 pr-4 text-red-600 rounded md:bg-transparent md:p-0 underline underline-offset-8 decoration-2 decoration-red-400"
                       href="{{ route('home') }}">ACCUEIL</a>
                @else
                    <a class="hover:cursor-pointer block py-2 pl-3 pr-4 text-gray-900 rounded md:border-0 md:hover:text-red-600 md:hover:underline md:hover:underline-offset-8 md:hover:decoration-2 md:hover:decoration-red-400 md:p-0"
                       href="{{ route('home') }}">ACCUEIL</a>
                @endif
            </li>

            <li>
                @if (request()->routeIs('order'))
                    <a class="hover:cursor-pointer block py-2 pl-3 pr-4 text-red-600 rounded md:bg-transparent md:p-0 underline underline-offset-8 decoration-2 decoration-red-400"
                       href="{{ route('order') }}">COMMANDER</a>
                @else
                    <a class="hover:cursor-pointer block py-2 pl-3 pr-4 text-gray-900 rounded md:border-0 md:hover:text-red-600 md:hover:underline md:hover:underline-offset-8 md:hover:decoration-2 md:hover:decoration-red-400 md:p-0"
                       href="{{ route('order') }}">COMMANDER</a>
                @endif
            </li>

            <li>
                @if (request()->routeIs('posts'))
                    <a class="hover:cursor-pointer block py-2 pl-3 pr-4 text-red-600 rounded md:bg-transparent md:p-0 underline underline-offset-8 decoration-2 decoration-red-400"
                       href="{{ route('posts') }}">BLOG</a>
                @else
                    <a class="hover:cursor-pointer block py-2 pl-3 pr-4 text-gray-900 rounded md:border-0 md:hover:text-red-600 md:hover:underline md:hover:underline-offset-8 md:hover:decoration-2 md:hover:decoration-red-400 md:p-0"
                       href="{{ route('posts') }}">BLOG</a>
                @endif
            </li>
            <li>
                @if (request()->routeIs('contact'))
                    <a class="hover:cursor-pointer block py-2 pl-3 pr-4 text-red-600 rounded md:bg-transparent md:p-0 underline underline-offset-8 decoration-2 decoration-red-400"
                       href="{{ route('contact') }}">CONTACT</a>
                @else
                    <a class="hover:cursor-pointer block py-2 pl-3 pr-4 text-gray-900 rounded md:border-0 md:hover:text-red-600 md:hover:underline md:hover:underline-offset-8 md:hover:decoration-2 md:hover:decoration-red-400 md:p-0"
                       href="{{ route('contact') }}">CONTACT</a>
                @endif
            </li>

            @guest
                @if (Route::has('login') or Route::has('register'))
                    <li>
                        <a class="user-icon-container hover:cursor-pointer" href="{{ route('login') }}">
                            <img alt="User icon" class="w-8" src="{{ asset("user-icon.svg")  }}">
                        </a>
                    </li>

                    <li>
                        <a class="cart-icon-container hover:cursor-pointer" href="{{ route('cart') }}">
                            <img alt="Cart icon" class="w-8" src="{{ asset("cart-icon.svg")  }}">
                        </a>
                    </li>
                @endif
            @else
                <li>
                    <a class="user-icon-container hover:cursor-pointer" href="{{ route('user') }}">
                        <img alt="User icon" class="w-8" src="{{ asset("user-icon.svg")  }}">
                    </a>
                </li>
                <li>
                    <a class="cart-icon-container hover:cursor-pointer relative py-2" href="{{ route('cart') }}">
                        @if(sizeof(Auth::user()->cartProducts()) > 0)
                            <div class="t-0 absolute left-4">
                                <p class="flex h-0.5 w-0.5 items-center justify-center rounded-full bg-red-500 p-2.5 text-xs text-white">{{sizeof(Auth::user()->cartProducts())}}</p>
                            </div>
                        @endif
                        <img alt="Cart icon" class="w-8" src="{{ asset("cart-icon.svg")  }}">
                    </a>
                </li>
                @if (Auth::user() && Auth::user()->role === 'admin')
                    <li>
                        <a class="admin-icon-container hover:cursor-pointer" href="{{ route('admin') }}">
                            <img alt="User icon" class="w-8" src="{{ asset("admin.svg")  }}">
                        </a>
                    </li>
                @endif
                <li>
                    <a class="logout-icon-container hover:cursor-pointer" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <img alt="Logout icon" class="w-8" src="{{ asset("logout.svg")  }}">
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            @endguest
        </ul>
    </div>

</nav>


