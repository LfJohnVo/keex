<div wire:init="loadPosts">
    @if (count($products))
        <div class="glider-contain">
            {{-- Pass Id from product to glider function --}}
            <ul class="glider-{{ $category->id }} py-4">

                @foreach ($products as $product)

                    <li
                        class="duration-300 ease-in-out transform rounded-lg cursor-pointer w-56 hover:scale-105 {{ $loop->last ? '' : 'sm:mr-4' }}">

                        <article>
                            <div class="p-3 bg-white shadow-md rounded-3xl">
                                <div class="">
                                    <div class="relative w-full mb-3 h-62 lg:mb-0">
                                        <div class="absolute top-0 right-0 flex flex-col p-3">
                                            <button
                                                class="text-gray-200 transition duration-300 ease-in rounded-full hover:text-indigo-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>
                                        <figure>
                                            <img src="{{ Storage::url($product->images->first()->url) }}" alt=""
                                                class="object-fill w-full h-full rounded-2xl">
                                        </figure>
                                    </div>
                                    <div class="flex-auto p-2 justify-evenly">
                                        <div class="flex flex-wrap ">
                                            <div class="flex items-center flex-none w-full text-sm text-gray-600">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="w-4 h-4 mr-1 text-red-500" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                                <span class="mr-3 text-secondary whitespace-nowrap">4.60</span>
                                            </div>
                                            <div class="flex items-center justify-between w-full min-w-0 ">
                                                <h2
                                                    class="mr-auto text-lg truncate cursor-pointer hover:text-gray-900 ">
                                                    {{ Str::limit($product->name, 20) }}</h2>
                                                <!-- <div
                                                class="flex items-center px-2 py-1 ml-3 text-xs text-white bg-green-400 rounded-lg">
                                                IN STOCK</div> -->
                                            </div>
                                        </div>
                                        <div class="mt-1 text-xl font-semibold">$ {{ $product->price }}</div>
                                        <div class="flex p-4 pb-2 border-t border-gray-200 "></div>
                                        <div class="flex justify-center space-x-2 text-sm font-medium">
                                            <button
                                                class="inline-flex px-5 py-2 mb-2 font-medium tracking-wider text-white transition duration-300 ease-in bg-indigo-500 rounded-full items-centertext-sm md:mb-0 hover:shadow-lg hover:bg-indigo-600 ">
                                                <span>Añadir al carrito</span>
                                            </button>
                                            <button
                                                class="p-2 text-center text-white transition duration-300 ease-in bg-yellow-300 rounded-full hover:bg-yellow-400 hover:shadow-lg w-9 h-9">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
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
