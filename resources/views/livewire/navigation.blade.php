<header class="sticky top-0 z-50 bg-gray-900" x-data="dropdown()">
    <div class="container flex items-center justify-between h-16 md:justify-start">
        <a :class="{'bg-opacity-100 text-blue-600' : open}" x-on:click="show()"
            class="flex flex-col items-center justify-center order-last h-full px-6 text-white bg-white bg-opacity-25 cursor-pointer md:px-4 md:order-first semibold">
            <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span class="hidden text-sm md:block">Categorias</span>
        </a>

        <a href="/" class="mx-6">
            <x-jet-application-mark class="block w-auto h-9" />
        </a>

        <div class="flex-1 hidden md:block">
            @livewire('search')
        </div>

        <!-- Settings Dropdown -->
        <div class="relative hidden mx-6 md:block">
            @auth
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex text-sm transition border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300">
                            <img class="object-cover w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-jet-dropdown-link>

                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                {{ __('API Tokens') }}
                            </x-jet-dropdown-link>
                        @endif

                        <div class="border-t border-gray-100"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                                        this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown>
            @else
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <i class="text-3xl text-white cursor-pointer fas fa-user-circle"></i>
                    </x-slot>

                    <x-slot name="content">
                        <x-jet-dropdown-link href="{{ route('login') }}">
                            {{ __('Login') }}
                        </x-jet-dropdown-link>
                        <x-jet-dropdown-link href="{{ route('register') }}">
                            {{ __('Register') }}
                        </x-jet-dropdown-link>
                    </x-slot>
                </x-jet-dropdown>
            @endauth
        </div>

        <div class="hidden mx-6 md:block">
            @livewire('dropdown-cart')
        </div>

    </div>

    <nav id="navigation-menu" x-show="open" class="absolute w-full bg-black bg-opacity-25">
        {{-- Menu para computadoras --}}
        <div class="container hidden h-full md:block">
            {{-- Menu a mostrar durante el hover --}}
            <div x-on:click.away="close()" class="relative grid h-full grid-cols-4">
                <ul class="bg-white text-black-600">
                    @foreach ($categories as $category)
                        <li class="navigation-link hover:bg-purple-400 hover:text-white">
                            <a class="flex items-center px-4 py-2 text-sm" href="{{ route('categories.show', $category) }}">
                                <span class="flex justify-center w-9">
                                    {!! $category->icon !!}
                                </span>
                                {{ $category->name }}
                            </a>

                            <div class="absolute top-0 right-0 hidden w-3/4 h-full bg-gray-100 navigation-submenu">
                                <x-navigation-subcategories :category="$category" />
                            </div>

                        </li>
                    @endforeach
                </ul>

                {{-- Menu subcategorias seria el primer menu en mostrarse --}}
                <div class="col-span-3 bg-gray-100">
                    <x-navigation-subcategories :category="$categories->first()" />
                </div>

            </div>
        </div>
        {{-- Menu para computadoras --}}

        {{-- menu movil --}}
        <div class="h-full overflow-y-auto bg-white">

            <div class="container py-3 pb-3 mb-3 bg-gray-200">
                @livewire('search')
            </div>

            <ul>
                @foreach ($categories as $category)
                    <li class="hover:bg-purple-400 hover:text-white">
                        <a class="flex items-center px-4 py-2 text-sm " href="{{ route('categories.show', $category) }}">
                            <span class="flex justify-center w-9">
                                {!! $category->icon !!}
                            </span>
                            {{ $category->name }}
                        </a>

                    </li>
                @endforeach
            </ul>

            <p class="px-6 my-2 text-gray-500">USUARIOS</p>
            @livewire('cart-mobile')
            @auth
                <a href="{{ route('profile.show') }}"
                    class="flex items-center px-4 py-2 text-sm hover:bg-purple-400 hover:text-white" href="">
                    <span class="flex justify-center w-9">
                        <i class="fas fa-user-circle"></i>
                    </span>
                    Perfil
                </a>

                <a href="" onclick="event.preventDefault();
                                    document.getElementById('logout-from').submit()"
                    class="flex items-center px-4 py-2 text-sm hover:bg-purple-400 hover:text-white" href="">
                    <span class="flex justify-center w-9">
                        <i class="fas fa-sign-out-alt"></i>
                    </span>
                    Cerrar sesión
                </a>

                <form id="logout-from" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}"
                    class="flex items-center px-4 py-2 text-sm hover:bg-purple-400 hover:text-white" href="">
                    <span class="flex justify-center w-9">
                        <i class="fas fa-user-circle"></i>
                    </span>
                    Iniciar sesión
                </a>

                <a href="{{ route('register') }}"
                    class="flex items-center px-4 py-2 text-sm hover:bg-purple-400 hover:text-white" href="">
                    <span class="flex justify-center w-9">
                        <i class="fas fa-fingerprint"></i>
                    </span>
                    Registrate
                </a>
            @endauth

        </div>
        {{-- menu movil --}}
    </nav>
</header>
