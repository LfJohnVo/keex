<div>
    <div class="mb-6 bg-white rounded-lg shadow-lg">
        <div class="flex items-center justify-between px-6 py-2">
            <h1 class="font-semibold text-gray-700 uppercase">{{ $category->name }}</h1>

            <div class="grid grid-cols-2 text-gray-500 border border-gray-200 divide-x divide-gray-200">
                <i class="p-3 cursor-pointer fas fa-border-all"></i>
                <i class="p-3 cursor-pointer fas fa-th-list"></i>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">
        <aside>
            <h2 class="mb-2 font-semibold text-left">Subcategorías</h2>
            <ul>
                @foreach ($category->subcategories as $subcategory)
                    <li class="my-2">
                        <a href="" class="capitalize cursor-pointer hover:text-purple-400">
                            {{ $subcategory->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </aside>

        <div class="col-span-4">
            <ul class="grid grid-cols-4 gap-6">
                @foreach ($products as $product)
                    <li class="w-56 mb-3 duration-300 ease-in-out transform rounded-lg cursor-pointer hover:scale-105">

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

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </li>
                @endforeach
            </ul>
            <div class="mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>

</div>