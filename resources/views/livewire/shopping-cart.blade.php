<div class="container py-8">
    <x-table-responsive>
        <div class="px-6 py-4 bg-white">
            <h1 class="text-lg font-semibold text-gray-700">CARRO DE COMPRAS</h1>
        </div>

        @if (Cart::count())

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Nombre
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Precio
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Cantidad
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Total
                        </th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">

                    @foreach (Cart::content() as $item)

                        {{-- <tr>
                            <td>
                                <div class="flex">
                                    <img class="object-cover w-20 mr-4 h-15" src="{{ $item->options->image }}" alt="">
                                    <div>
                                        <p class="font-bold">{{$item->name}}</p>

                                        @if ($item->options->color)
                                            <span>
                                                Color: {{ __($item->options->color) }}
                                            </span>
                                        @endif

                                        @if ($item->options->size)

                                            <span class="mx-1">-</span>

                                            <span>
                                                {{ $item->options->size }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            <td class="text-center">
                                <span>USD {{ $item->price }}</span>
                                <a class="ml-6 cursor-pointer hover:text-red-600"
                                    wire:click="delete('{{$item->rowId}}')"
                                    wire:loading.class="text-red-600 opacity-25"
                                    wire:target="delete('{{$item->rowId}}')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>

                            <td>
                                <div class="flex justify-center">
                                    @if ($item->options->size)

                                        @livewire('update-cart-item-size', ['rowId' => $item->rowId], key($item->rowId))

                                    @elseif($item->options->color)

                                        @livewire('update-cart-item-color', ['rowId' => $item->rowId], key($item->rowId))

                                    @else

                                        @livewire('update-cart-item', ['rowId' => $item->rowId], key($item->rowId))

                                    @endif
                                </div>
                            </td>

                            <td class="text-center">
                                USD {{$item->price * $item->qty}}
                            </td>
                        </tr> --}}

                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-10 h-10">
                                        <img class="object-cover object-center w-10 h-10 rounded-full"
                                            src="{{ $item->options->image }}" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $item->name }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            @if ($item->options->color)
                                                <span>
                                                    Color: {{ __($item->options->color) }}
                                                </span>
                                            @endif

                                            @if ($item->options->size)

                                                <span class="mx-1">-</span>

                                                <span>
                                                    {{ $item->options->size }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">

                                <div class="text-sm text-gray-500">
                                    <span>$ {{ $item->price }}</span>
                                    <a class="ml-6 cursor-pointer hover:text-red-600"
                                        wire:click="delete('{{ $item->rowId }}')"
                                        wire:loading.class="text-red-600 opacity-25"
                                        wire:target="delete('{{ $item->rowId }}')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">
                                    @if ($item->options->size)

                                        @livewire('update-cart-item-size', ['rowId' => $item->rowId], key($item->rowId))

                                    @elseif($item->options->color)
                                        @livewire('update-cart-item-color', ['rowId' => $item->rowId],
                                        key($item->rowId))
                                    @else
                                        @livewire('update-cart-item', ['rowId' => $item->rowId], key($item->rowId))
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                <div class="text-sm text-gray-500">
                                    $ {{ $item->price * $item->qty }}
                                </div>
                            </td>
                        </tr>

                    @endforeach

                </tbody>
            </table>

            <div class="px-6 py-4">
                <a class="inline-block mt-3 text-sm cursor-pointer hover:underline" wire:click="destroy">
                    <i class="fas fa-trash"></i>
                    Borrar carrito de compras
                </a>
            </div>

        @else
            <div class="flex flex-col items-center pb-2">
                <x-cart />
                <p class="mt-4 text-lg text-gray-700">TU CARRO DE COMPRAS ESTÁ VACÍO</p>

                <x-button-enlace href="/" class="px-16 mt-4">
                    Ir al inicio
                </x-button-enlace>
            </div>
        @endif

    </x-table-responsive>

    <!-- This example requires Tailwind CSS v2.0+ -->

    @if (Cart::count())

        <div class="px-6 py-4 mt-4 bg-white rounded-lg shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-700">
                        <span class="text-lg font-bold">Total:</span>
                        $ {{ Cart::subTotal() }}
                    </p>
                </div>

                <div>
                    <x-button-enlace class="px-4 py-2" href="{{ route('orders.create') }}">
                        Comprar
                    </x-button-enlace>
                </div>
            </div>
        </div>

    @endif
</div>
