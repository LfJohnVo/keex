<x-app-layout>
    <div class="container py-12">
        <section class="grid grid-cols-5 gap-6 text-gray">
            <a href="{{ route('orders.index'). "?status=1"}}" class="flex items-center p-4 bg-white rounded-lg shadow-lg">
                <div class="p-3 mr-4 text-white bg-blue-500 rounded-full shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600">
                        Pendientes
                    </p>
                    <p class="text-lg font-semibold text-gray-700">
                        {{ $pendiente }}
                    </p>
                </div>
            </a>
            <a href="{{ route('orders.index'). "?status=2"}}" class="flex items-center p-4 bg-white rounded-lg shadow-lg">
                <div class="p-3 mr-4 text-white bg-blue-800 rounded-full shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600">
                        Recibido
                    </p>
                    <p class="text-lg font-semibold text-gray-700">
                        {{ $recibido }}
                    </p>
                </div>
            </a>
            <a href="{{ route('orders.index'). "?status=3"}}" class="flex items-center p-4 bg-white rounded-lg shadow-lg">
                <div class="p-3 mr-4 text-white bg-purple-600 rounded-full shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600">
                        Enviado
                    </p>
                    <p class="text-lg font-semibold text-gray-700">
                        {{ $enviado }}
                    </p>
                </div>
            </a>
            <a href="{{ route('orders.index'). "?status=4"}}" class="flex items-center p-4 bg-white rounded-lg shadow-lg">
                <div class="p-3 mr-4 text-white bg-green-500 rounded-full shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 15v-1a4 4 0 00-4-4H8m0 0l3 3m-3-3l3-3m9 14V5a2 2 0 00-2-2H6a2 2 0 00-2 2v16l4-2 4 2 4-2 4 2z" />
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600">
                        Entregado
                    </p>
                    <p class="text-lg font-semibold text-gray-700">
                        {{ $entregado }}
                    </p>
                </div>
            </a>
            <a href="{{ route('orders.index'). "?status=5"}}" class="flex items-center p-4 bg-white rounded-lg shadow-lg">
                <div class="p-3 mr-4 text-white bg-red-600 rounded-full shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600">
                        Anulado
                    </p>
                    <p class="text-lg font-semibold text-gray-700">
                        {{ $anulado }}
                    </p>
                </div>
            </a>
        </section>

        <section class="px-12 py-8 mt-12 text-gray-700 bg-white rounded-lg shadow-lg">
            <h1 class="mb-4 text-2xl">Pedidos recientes</h1>

            <ul>
                @foreach ($orders as $order)
                    <li>
                        <a href="{{ route('orders.show', $order) }}" class="flex items-center px-4 py-2 hover:bg-purple-100">
                            <span>
                                @switch($order->status)
                                    @case(1)
                                        <div class="p-1 mr-1 text-white bg-blue-500 rounded-full shadow-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>

                                    @break
                                    @case(2)
                                        <div class="p-1 mr-1 text-white bg-blue-800 rounded-full shadow-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </div>
                                    @break
                                    @case(3)
                                        <div class="p-1 mr-1 text-white bg-purple-600 rounded-full shadow-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                    @break
                                    @case(4)
                                        <div class="p-1 mr-1 text-white bg-green-500 rounded-full shadow-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 15v-1a4 4 0 00-4-4H8m0 0l3 3m-3-3l3-3m9 14V5a2 2 0 00-2-2H6a2 2 0 00-2 2v16l4-2 4 2 4-2 4 2z" />
                                            </svg>
                                        </div>
                                    @break
                                    @case(5)
                                        <div class="p-1 mr-1 text-white bg-red-600 rounded-full shadow-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                    @break
                                @endswitch
                            </span>

                            <span class="ml-2">
                                Orden: #{{ $order->id }}
                                <br>
                                {{ $order->created_at->format('d/m/Y') }}
                            </span>

                            <div class="ml-auto">
                                <span class="font-bold">
                                    @switch($order->status)
                                        @case(1)
                                            Pendiente
                                        @break
                                        @case(2)
                                            Recibido
                                        @break
                                        @case(3)
                                            Enviado
                                        @break
                                        @case(4)
                                            Entregado
                                        @break
                                        @case(5)
                                            Anulado
                                        @break
                                    @endswitch
                                </span>
                                <br>
                                <span class="text-sm">
                                    $ {{ $order->total }}
                                </span>
                            </div>

                            <span class="ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </span>
                        </a>

                    </li>
                @endforeach
            </ul>
        </section>
    </div>
</x-app-layout>
