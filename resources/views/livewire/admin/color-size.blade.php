<div>
    <div class="p-6 my-2 bg-white rounded-lg shadow-lg">
        <h5 class="text-center">Utilice esta sección para agregar y modificar la cantidad y color de su producto</h5>
        <hr>
        {{-- Color --}}
        <div class="mb-6">
            <x-jet-label>
                Color
            </x-jet-label>

            <div class="grid grid-cols-6 gap-6">
                @foreach ($colors as $color)
                    <label>
                        <input type="radio" name="color_id" wire:model.defer="color_id" value="{{ $color->id }}">
                        <span class="ml-2 text-gray-700 capitalize">
                            {{ __($color->name) }}
                        </span>
                    </label>
                @endforeach
            </div>

            <x-jet-input-error for="color_id" />
        </div>

        {{-- Cantidad --}}
        <div>

            <x-jet-label>
                Cantidad
            </x-jet-label>

            <x-jet-input type="number" wire:model.defer="quantity" placeholder="Ingrese una cantidad"
                class="w-full" />

            <x-jet-input-error for="quantity" />

        </div>

        <div class="flex items-center justify-end mt-4">

            <x-jet-action-message class="mr-3 shadow-lg" on="saved">
                Agregado
            </x-jet-action-message>

            <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save">
                Agregar
            </x-jet-button>
        </div>

    </div>
</div>
