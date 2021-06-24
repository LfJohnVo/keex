<header class="bg-gray-900">
    <div class="container flex items-center h-16">
        <a
            class="flex flex-col items-center justify-center h-full px-4 text-white bg-white bg-opacity-25 cursor-pointer semibold">
            <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span>Categorias</span>
        </a>

        <a href="/" class="mx-6">
            <x-jet-application-mark class="block w-auto h-9" />
        </a>

        @livewire('search')

        <x-search />

    </div>
</header>
