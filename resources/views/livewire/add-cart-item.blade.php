<div x-data>
    <p class="mb-4 text-gray-700">Stock disponible <span class="text-lg font-semibold">{{$quantity}}</span></p>
    <div class="flex">
        <div class="mr-4">
            <x-jet-secondary-button disabled x-bind:disabled="$wire.qty <= 1" wire:loading.attr="disabled" wire:target="decrement" wire:click="decrement">
                -
            </x-jet-secondary-button>
            <span class="mx-2 text-gray-600">{{ $qty }}</span>
            <x-jet-secondary-button wire:click="increment" x-bind:disabled="$wire.qty >= $wire.quantity" wire:loading.attr="disabled" wire:target="increment">
                +
            </x-jet-secondary-button>
        </div>

        <div class="flex-1">
            <x-button class="w-full">
                Agregar al carrito de compras
            </x-button>
        </div>
    </div>
</div>
