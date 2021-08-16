<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-2 gap-6">
            <div>
                <div class="flexslider">
                    <ul class="rounded-lg slides">
                        @foreach ($product->images as $image)

                            <li data-thumb=" {{ Storage::url($image->url) }}">
                                <img src=" {{ Storage::url($image->url) }}" alt="{{ $image->name }}" />
                            </li>

                        @endforeach

                    </ul>
                </div>

                <div class="-mt-10 text-gray-700">
                    <h2 class="text-lg font-bold">Descripción</h2>
                    {!!$product->description!!}
                </div>

            </div>

            <div>
                <h1 class="text-xl font-bold text-gray-700">{{ $product->name }}</h1>

                <div class="flex">
                    <p class="text-gray-700">Marca: <a class="underline capitalize hover:text-purple-500"
                            href="">{{ $product->brand->name }}</a></p>
                    <p class="mx-6 text-gray-700">5 <i class="text-sm text-yellow-400 fas fa-star"></i></p>
                    <a class="text-gray-500 underline hover:text-purple-600" href="">39 reseñas</a>
                </div>

                <p class="my-4 text-2xl font-semibold text-trueGray-700">$ {{ $product->price }}</p>

                <div class="mb-6 bg-white rounded-lg shadow-lg">
                    <div class="flex items-center p-4">
                        <span class="flex items-center justify-center w-10 h-10 bg-green-600 rounded-full">
                            <i class="text-sm text-white fas fa-truck"></i>
                        </span>

                        <div class="ml-4">
                            <p class="text-lg font-semibold text-green-600">Se hace envíos a todo México</p>
                            {{-- Get date from locale you choose --}}
                            <p>Recibelo el {{ Date::now()->addDay(7)->locale('es')->format('l j F') }}</p>
                        </div>
                    </div>
                </div>

                @if ($product->subcategory->size)

                    @livewire('add-cart-item-size', ['product' => $product])

                @elseif($product->subcategory->color)

                    @livewire('add-cart-item-color', ['product' => $product])

                @else

                    @livewire('add-cart-item', ['product' => $product])

                @endif
            </div>
        </div>
    </div>

    @push('script')
        <script>
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });
        </script>
    @endpush
</x-app-layout>
