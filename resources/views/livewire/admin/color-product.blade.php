<div>
    <div class="p-6 my-2 bg-white rounded-lg shadow-lg">
        <h5 class="text-center">Utilice esta sección para agregar y modificar la cantidad y color de su producto</h5>
        <hr>
        @if ($product_colors->count())

            <div class="p-6">
                <table class="text-center">
                    <thead>
                        <tr>
                            <th class="w-1/3 px-4 py-2">
                                Color
                            </th>

                            <th class="w-1/3 px-4 py-2">
                                Cantidad
                            </th>
                            <th class="w-1/3 px-4 py-2"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($product_colors as $product_color)
                            <tr wire:key="product_color-{{ $product_color->pivot->id }}">
                                <td class="px-4 py-2 capitalize">
                                    {{ __($colors->find($product_color->pivot->color_id)->name) }}
                                </td>
                                <td class="px-4 py-2">
                                    {{ $product_color->pivot->quantity }} unidades
                                </td>
                                <td class="flex px-4 py-2">
                                    <x-jet-secondary-button class="ml-auto mr-2 shadow-lg"
                                        wire:click="edit({{ $product_color->pivot->id }})"
                                        wire:loading.attr="disabled"
                                        wire:target="edit({{ $product_color->pivot->id }})">
                                        Actualizar
                                    </x-jet-secondary-button>

                                    <x-jet-danger-button class="shadow-lg"
                                        wire:click="$emit('deletePivot', {{ $product_color->pivot->id }})">
                                        Eliminar
                                    </x-jet-danger-button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        @endif

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

    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Editar colores
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label>
                    Color
                </x-jet-label>

                <select class="w-full form-control" wire:model="pivot_color_id">
                    <option value="">Seleccione un color</option>
                    @foreach ($colors as $color)
                        <option value="{{ $color->id }}">{{ ucfirst(__($color->name)) }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <x-jet-label>
                    Cantidad
                </x-jet-label>
                <x-jet-input class="w-full" wire:model="pivot_quantity" type="number"
                    placeholder="Ingrese una cantidad" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-button wire:click="update" wire:loading.attr="disabled" wire:target="update">
                Actualizar
            </x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>

    @push('script')
        <script>
            Livewire.on('deletePivot', pivot => {
                Swal.fire({
                    title: '¿Estas seguro?',
                    text: "Esta opción eliminar el registro",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, seguro!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('admin.color-product', 'delete', pivot);

                        Swal.fire(
                            '¡Eliminado!',
                            'El registro fue eliminado.',
                            'success'
                        )
                    }
                })
            })
        </script>
    @endpush

</div>
