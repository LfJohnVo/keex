<div class="relative flex-1" x-data>
    <div class="relative text-gray-600">
        <x-jet-input wire:model="search" type="text"
            class="flex w-full h-10 px-5 pr-10 text-sm bg-white rounded-full focus:outline-none"
            placeholder="¿Que estas buscando?" />
        <button type="submit" class="absolute top-0 right-0 mt-3 mr-4">
            <x-search size="512" />
        </button>
    </div>

    <div class="absolute hidden w-full" :class="{ 'hidden' : !$wire.open }" @click.away="$wire.open = false">
        <div class="mt-1 bg-white rounded-lg shadow-xl">
            <div class="px-4 py-3 space-y-1">
                @forelse ($products as $product)
                    <a href="{{ route('products.show', $product) }}" class="flex">
                        <img class="object-cover w-16 h-12" src="{{ Storage::url($product->images->first()->url) }}"
                            alt="{{ $product->name }}">
                        <div class="ml-4 text-gray-700">
                            <p class="text-lg font-semibold leading-5">{{ $product->name }}</p>
                            <p>Categoría: {{ $product->subcategory->category->name }}</p>
                        </div>
                    </a>
                    <hr>
                @empty
                    <p class="text-lg leading-5">No existe ningún registro con los parametros especificados ...</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
