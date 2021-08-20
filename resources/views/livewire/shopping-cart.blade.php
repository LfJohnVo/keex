<div class="container py-8">
    <section class="p-6 text-gray-700 bg-white rounded-lg shadow-lg">
        <h1 class="mb-6 text-lg font-semibold">Carro de compras</h1>

        <table class="w-full table-auto">
            <thead>
                <th></th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
            </thead>
            <tbody>
                @foreach (Cart::content() as $item)
                    <tr>
                        <td>
                            <div class="flex">
                                <img class="object-cover w-20 mr-4 h-15" src="{{ $item->options->image }}" alt="">
                                <div>
                                    <p class="font-bold">{{ $item->name }}</p>
                                    @if ($item->options->color)
                                        <span>
                                            Color: {{ __($item->options->color) }}
                                        </span>
                                    @endif

                                    @if ($item->options->size)
                                        <span class="mx-1">-</span>
                                        <span>
                                            {{ __($item->options->size) }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td>
                            <span>$ {{ $item->price }}</span>
                            <a class="ml-6 cursor-pointer hover:text-red-600">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                        <td>
                            @if ($item->options->size)
                                @livewire('update-cart-item-size', ['rowId' => $item->rowId], key($item->rowId))
                            @elseif($item->options->color)
                                @livewire('update-cart-item-color', ['rowId' => $item->rowId], key($item->rowId))
                            @else
                                @livewire('update-cart-item', ['rowId' => $item->rowId], key($item->rowId))
                            @endif
                        </td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </section>
</div>
