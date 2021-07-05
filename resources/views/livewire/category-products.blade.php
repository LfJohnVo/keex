<div wire:init="loadPosts">
    @if (count($products))
        <div class="glider-contain">
            {{-- Pass Id from product to glider function --}}
            <ul class="glider-{{ $category->id }} py-4">

                @foreach ($products as $product)

                    <li
                        class="duration-300 ease-in-out transform bg-white rounded-lg cursor-pointer w-56 hover:scale-105 shadow-lg {{ $loop->last ? '' : 'sm:mr-4' }}">
                        <article>
                            <figure>
                                <img class="object-cover object-center w-full h-48"
                                    src="{{ Storage::url($product->images->first()->url) }}" alt="">
                            </figure>

                            <div class="px-6 py-4">
                                <h1 class="text-lg font-semibold">
                                    <a href="">
                                        {{ Str::limit($product->name, 20) }}
                                    </a>
                                </h1>

                                <p class="font-bold text-gray-700">$ {{ $product->price }}</p>
                            </div>
                        </article>
                    </li>

                @endforeach

            </ul>

            <button aria-label="Previous" class="text-purple-600 glider-prev">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                </svg>
            </button>
            <button aria-label="Next" class="text-purple-600 glider-next">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                </svg>
            </button>
            <div role="tablist" class="dots"></div>
        </div>
    @else
        <span class="flex items-center justify-center">Cargando ...</span>
        <div class="flex items-center justify-center h-48 mb-4 bg-white border border-gray-100 rounded-lg shadow-xl">
            <div class="flex items-center justify-center">
                <div class="w-20 h-20 border-t-2 border-b-2 border-purple-500 rounded-full animate-spin"></div>
            </div>
        </div>
    @endif
</div>
