<div x-data>
    <p class="text-xl text-gray-700">Color:</p>

    <select wire:model="color_id" class="w-full bg-white rounded-lg shadow-xl">
        <option class="p-4 cursor-pointer hover:bg-gray-50" value="" selected disabled>Seleccionar un color</option>
        @foreach ($colors as $color)
            <option value="{{ $color->id }}">{{ __($color->name) }}</option>
        @endforeach
    </select>

    <div class="flex mt-5">
        <div class="mr-4">
            <x-jet-secondary-button disabled x-bind:disabled="$wire.qty <= 1" wire:loading.attr="disabled"
                wire:target="decrement" wire:click="decrement">
                -
            </x-jet-secondary-button>
            <span class="mx-2 text-gray-600">{{ $qty }}</span>
            <x-jet-secondary-button wire:click="increment" x-bind:disabled="$wire.qty >= $wire.quantity"
                wire:loading.attr="disabled" wire:target="increment">
                +
            </x-jet-secondary-button>
        </div>

        <div class="flex-1">
            <x-button class="w-full" x-bind:disabled="!$wire.quantity" wire:loading.attr="disabled">
                Agregar al carrito de compras
            </x-button>
        </div>
    </div>

</div>
