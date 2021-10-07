<x-app-layout>

    @php
        //SDK mercadopago
        require base_path('vendor/autoload.php');
        //Agrega credenciales
        MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

        // Crea un objeto de preferencia
        $preference = new MercadoPago\Preference();
        $shipments = new MercadoPago\Shipments();

        $shipments->cost = $order->shipping_cost;
        $shipments->mode = "not_specified";

        $preference->shipments = $shipments;

        // Crea un ítem en la preferencia
        foreach ($items as $product) {
            $item = new MercadoPago\Item();
            $item->title = $product->name;
            $item->quantity = $product->qty;
            $item->unit_price = $product->price;
            $products[] = $item;
        }

        $preference->back_urls = [
            //'success' => 'https://www.tu-sitio/success',
            'success' => route('orders.pay', $order),
            'failure' => 'http://www.tu-sitio/failure',
            'pending' => 'http://www.tu-sitio/pending',
        ];
        $preference->auto_return = 'approved';

        $preference->items = $products;
        $preference->save();
    @endphp

    <div class="container py-8">
        <div class="px-6 py-4 mb-6 bg-white rounded-lg shadow-lg">
            <p class="text-lg text-gray-700 uppercase">Número de orden: #{{ $order->id }}</p>
        </div>

        <div class="p-6 px-6 py-4 mb-6 bg-white rounded-lg shadow-lg">
            <div class="grid grid-cols-2 gap-6 text-gray-700">
                <div>
                    <p class="text-lg font-semibold uppercase">Envío</p>

                    @if ($order->envio_type == 1)
                        <p class="text-sm">Los productos deben ser recogidos en tienda</p>
                        <p class="text-sm">Calle falsa 123</p>
                    @else
                        <p class="text-sm">Los productos seran enviados a: <span
                                class="text-sm">{{ $order->address }}</span></p>
                        <p>{{ $order->department->name }} - {{ $order->city->name }} -
                            {{ $order->district->name }}</p>
                    @endif
                </div>

                <div>
                    <p class="text-lg font-semibold uppercase">Datos de contacto</p>

                    <p class="text-sm">Persona que recibirá el producto: {{ $order->contact }}</p>
                    <p class="text-sm">Teléfono de contacto: {{ $order->phone }}</p>
                </div>
            </div>
        </div>

        <div class="px-6 py-4 mb-6 text-gray-700 bg-white rounded-lg shadow-lg">
            <p class="mb-4 text-xl font-semibold">Resumen</p>

            <table class="w-full table-auto">
                <thead>
                    <tr>
                        <th></th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @foreach ($items as $item)
                        <tr>
                            <td>
                                <div class="flex">
                                    <img class="object-cover w-20 mr-4 h-15" src="{{ $item->options->image }}" alt="">
                                    <article>
                                        <h1 class="font-bold">{{ $item->name }}</h1>

                                        <div class="flex text-xs">
                                            @isset($item->options->color)
                                                Color: {{ __($item->options->color) }}
                                            @endisset

                                            @isset($item->options->size)
                                                - {{ $item->options->size }}
                                            @endisset
                                        </div>
                                    </article>
                                </div>
                            </td>
                            <td class="text-center">
                                $ {{ $item->price }}
                            </td>
                            <td class="text-center">
                                {{ $item->qty }}
                            </td>
                            <td class="text-center">
                                $ {{ $item->price * $item->qty }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex items-center justify-between px-6 py-4 mb-6 text-gray-700 bg-white rounded-lg shadow-lg">
            <img class="h-12" src="{{ asset('img/paymentslogos.jpg') }}" alt="">
            <div class="text-gray-700">
                <p class="text-sm font-semibold">
                    Subtotal: ${{ $order->total - $order->shipping_cost }}
                </p>
                <p class="text-sm font-semibold">
                    Envío: ${{ $order->shipping_cost }}
                </p>
                <p class="text-sm font-semibold uppercase">
                    Total: ${{ $order->total }}
                </p>
                <div class="cho-container">

                </div>
            </div>

        </div>
    </div>

    {{-- SDK MercadoPago.js V2 --}}
    <script src="https://sdk.mercadopago.com/js/v2"></script>


    <script>
        // Agrega credenciales de SDK
        const mp = new MercadoPago("{{ config('services.mercadopago.key') }}", {
            locale: 'es-MX'
        });

        // Inicializa el checkout
        mp.checkout({
            preference: {
                id: '{{ $preference->id }}'
            },
            render: {
                container: '.cho-container', // Indica el nombre de la clase donde se mostrará el botón de pago
                label: 'Pagar', // Cambia el texto del botón de pago (opcional)
            }
        });
    </script>


</x-app-layout>
