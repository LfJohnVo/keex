<x-app-layout>
    <div class="container py-8">
        <ul>
            @forelse ($products as $product)
                <x-product-list :product="$product">

                </x-product-list>
            @empty
                <li class="bg-white rounded-lg shadow-lg">
                    <div class="p-4">
                        <p class="text-lg text-gray-600">No se encontro ningún producto</p>
                    </div>
                </li>
            @endforelse
        </ul>
        <div class="mt-4">
            {{ $products->links() }}
        </div>
    </div>
</x-app-layout>
