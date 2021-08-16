<div x-data>
    <div>
        <p class="text-xl text-gray-700">Talla:</p>
        <select class="w-full bg-white rounded-lg shadow-xl" wire:model="size_id">
            <option value="" selected disabled>Seleccione una talla</option>
            @foreach ($sizes as $size)
                <option value="{{ $size->id }}">{{ $size->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mt-2">
        <p class="text-xl text-gray-700">Color:</p>
        <select class="w-full bg-white rounded-lg shadow-xl" wire:model="color_id">
            <option value="" selected disabled>Seleccione una color</option>
            @foreach ($colors as $color)
                <option class="capitalize" value="{{ $color->id }}">{{ $color->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="flex py-4">
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
            <x-button x-bind:disabled="!$wire.quantity" class="w-full" wire:click="addItem"
                wire:loading.attr="disabled" wire:target="addItem">
                Agregar al carrito de compras
            </x-button>
        </div>
    </div>
</div>
