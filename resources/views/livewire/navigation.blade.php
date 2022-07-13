<header class="sticky top-0 bg-neutral-700" x-data="dropdown()">
    <div class="flex items-center justify-between h-16 container-center md:justify-start">
        <a x-on:click="show()" :class="{ 'bg-opcity-100 text-orange-500': open }"
            class="flex flex-col items-center justify-center order-last h-full px-6 text-white bg-white bg-opacity-25 cursor-pointer mdfont-semibold md:order-first md:px-4">
            <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span class="hidden text-sm md:block">Categorías</span>
        </a>

        <a href="/" class="mx-6">
            <x-jet-application-mark class="block w-auto h-9"></x-jet-application-mark>
        </a>
        <div class="flex-1 hidden md:block">
            @livewire('search')
        </div>

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

                        <div class="border-t border-gray-100"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                onclick="event.preventDefault();
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
        <div class="hidden md:block">
            @livewire('dropdown-cart')
        </div>

    </div>
    <nav id="navigation-menu" :class="{ 'block': open, 'hidden': !open }"
        class="absolute hidden w-full bg-opacity-25 bg-neutral-700">
        {{-- Menu PC --}}
        <div class="hidden h-full container-center md:block">
            <div x-on:click.away="close()" class="relative grid h-full grid-cols-4">
                <ul class="bg-white ">
                    @foreach ($categories as $category)
                        <li class="navigation-link text-neutral-500 hover:bg-orange-500 hover:text-white">
                            <a href="" class="flex items-center px-4 py-2 text-sm">
                                <span class="flex justify-center w-9">
                                    {!! $category->icon !!}
                                </span>
                                {{ $category->name }}</a>
                            <div class="absolute top-0 right-0 hidden w-3/4 h-full bg-gray-100 navigation-submenu">
                                <x-navigation-subcategories :category="$category" />
                            </div>
                        </li>
                    @endforeach

                </ul>

                <div class="col-span-3 bg-gray-100">
                    <x-navigation-subcategories :category="$categories->first()" />
                </div>
            </div>
        </div>
        {{-- Menu mobile --}}
        <div class="h-full overflow-y-auto bg-white">
            <div class="container py-3 mb-2 bg-gray-100">
                @livewire('search')
            </div>
            <ul>
                @foreach ($categories as $category)
                    <li class="text-neutral-500 hover:bg-orange-500 hover:text-white">
                        <a href="" class="flex items-center px-4 py-2 text-sm">
                            <span class="flex justify-center w-9">
                                {!! $category->icon !!}
                            </span>
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <p class="px-6 my-2 text-neutral-500">Usuarios</p>
            @livewire('cart-mobile')
            @auth
                <a href="{{ route('profile.show') }}"
                    class="flex items-center px-4 py-2 text-sm text-neutral-500 hover:bg-orange-500 hover:text-white">
                    <span class="flex justify-center w-9">
                        <i class="fa fa-address-card"></i>
                    </span>
                    Perfile
                </a>
                <a href="" onclick="event.preventDefault();
                           document.getElementById('logout-form').submit(); "
                    class="flex items-center px-4 py-2 text-sm text-neutral-500 hover:bg-orange-500 hover:text-white">
                    <span class="flex justify-center w-9">
                        <i class="fa fa-sign-out-alt"></i>
                    </span>
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}"
                    class="flex items-center px-4 py-2 text-sm text-neutral-500 hover:bg-orange-500 hover:text-white">
                    <span class="flex justify-center w-9">
                        <i class="fa fa-user-circle"></i>
                    </span>
                    Login
                </a>
                <a href="{{ route('register') }}"
                    class="flex items-center px-4 py-2 text-sm text-neutral-500 hover:bg-orange-500 hover:text-white">
                    <span class="flex justify-center w-9">
                        <i class="fa fa-fingerprint"></i>
                    </span>
                    Register
                </a>
            @endauth
        </div>

    </nav>
</header>
