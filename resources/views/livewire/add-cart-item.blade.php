<div x-data>

    <p class="mb-4 text-gray-700">
        <span class="text-lg font-semibold">Stock disponible:</span> {{ $product->stock }}
    </p>

    <div class="flex">
        <div class="mr-4">
            <x-jet-secondary-button disabled x-bind:disabled="$wire.qty <= 1" wire:loading.attr="disabled"
                wire:target="decrement" wire:click="decrement">
                -
            </x-jet-secondary-button>

            <span class="mx-2 text-gray-700">{{ $qty }}</span>

            <x-jet-secondary-button x-bind:disabled="$wire.qty >= $wire.quantity" wire:loading.attr="disabled"
                wire:target="increment" wire:click="increment">
                +
            </x-jet-secondary-button>
        </div>

        <div class="flex-1">
            <x-button x-bind:disabled="$wire.qty > $wire.quantity" class="w-full" wire:click="addItem"
                wire:loading.attr="disabled" wire:target="addItem">
                Agregar al carrito de compras
            </x-button>
        </div>
    </div>
</div>
