@props(['product'])

<li class="mb-4 duration-300 ease-in-out transform bg-white rounded-lg shadow-lg cursor-pointer hover:scale-105">
    <article class="flex p-3 rounded-3xl">
        <figure>
            <a href="{{ route('products.show', $product) }}">
                <img class="object-cover object-center w-56 h-48"
                    src="{{ Storage::url($product->images->first()->url) }}" alt="{{ $product->name }}">
            </a>
        </figure>

        <div class="flex-col flex-1 px-6 py-4 bg-gray-50">
            <div class="flex justify-between">
                <div>
                    <a href="{{ route('products.show', $product) }}">
                        <h1 class="text-lg font-semibold">{{ $product->name }}
                        </h1>
                    </a>
                    <p class="font-semibold">$ {{ $product->price }}</p>
                </div>
                <div class="flex items-center">
                    <ul class="flex text-sm">
                        <li>
                            <i class="mr-2 text-yellow-400 fas fa-star"></i>
                        </li>
                        <li>
                            <i class="mr-2 text-yellow-400 fas fa-star"></i>
                        </li>
                        <li>
                            <i class="mr-2 text-yellow-400 fas fa-star"></i>
                        </li>
                        <li>
                            <i class="mr-2 text-yellow-400 fas fa-star"></i>
                        </li>
                        <li>
                            <i class="mr-2 text-yellow-400 fas fa-star"></i>
                        </li>
                    </ul>
                    <span class="text-gray-700">(24)</span>
                </div>
            </div>

            <div class="py-4 mt-auto mb-8">
                <x-danger-enlace href="{{ route('products.show', $product) }}">
                    Más información
                </x-danger-enlace>
            </div>
        </div>
    </article>
</li>
