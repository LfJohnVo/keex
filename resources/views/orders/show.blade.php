<x-app-layout>

    <div class="max-w-6xl px-4 py-12 mx-auto sm:px-6 lg:px-8">

        <div class="flex items-center px-12 py-8 mb-6 bg-white rounded-lg shadow-lg">
            <div class="relative">
                <div
                    class="{{ $order->status >= 2 && $order->status != 5 ? 'bg-blue-400' : 'bg-gray-400' }}  rounded-full h-12 w-12 flex items-center justify-center shadow-lg">
                    <i class="text-white fas fa-check "></i>
                </div>
                <div class="absolute -left-1.5 mt-0.5">
                    <p>Recibido</p>
                </div>
            </div>

            <div
                class="{{ $order->status >= 3 && $order->status != 5 ? 'bg-purple-400' : 'bg-gray-400' }} h-1 flex-1 mx-2 shadow-lg">
            </div>

            <div class="relative">
                <div
                    class="{{ $order->status >= 3 && $order->status != 5 ? 'bg-green-600' : 'bg-gray-400' }} rounded-full h-12 w-12 flex items-center justify-center shadow-lg">
                    <i class="text-white fas fa-truck"></i>
                </div>
                <div class="absolute -left-1 mt-0.5">
                    <p>Enviado</p>
                </div>
            </div>

            <div
                class="{{ $order->status >= 4 && $order->status != 5 ? 'bg-blue-400' : 'bg-gray-400' }} h-1 flex-1 mx-2 shadow-lg">
            </div>

            <div class="relative">
                <div
                    class="{{ $order->status >= 4 && $order->status != 5 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12 flex items-center justify-center shadow-lg">
                    <i class="text-white fas fa-check"></i>
                </div>
                <div class="absolute -left-2 mt-0.5">
                    <p>Entregado</p>
                </div>
            </div>

        </div>


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
                                    <img class="object-cover w-20 mr-4 h-15" src="{{ $item->options->image }}"
                                        alt="">
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
    </div>

</x-app-layout>
