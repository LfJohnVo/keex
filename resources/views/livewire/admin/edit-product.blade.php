<div>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-purple-600 uppercase">
                Productos
            </h2>

            <x-jet-danger-button wire:click="$emit('deleteProduct')">
                Eliminar
            </x-jet-danger-button>
        </div>
    </x-slot>

    <div class="max-w-4xl px-4 py-4 mx-auto text-gray-700 sm:px-6 lg:px-8">

        <h1 class="mb-8 text-3xl font-semibold text-center">Complete esta información para crear un producto</h1>

        <div class="mb-4" wire:ignore>
            <form action="{{ route('admin.products.files', $product) }}" method="POST" class="dropzone"
                id="my-awesome-dropzone"></form>
        </div>

        @if ($product->images->count())

            <section class="p-6 mb-4 bg-white rounded-lg shadow-xl">
                <h1 class="mb-2 text-2xl font-semibold text-center">Imagenes del producto</h1>

                <ul class="flex flex-wrap">
                    @foreach ($product->images as $image)

                        <li class="relative" wire:key="image-{{ $image->id }}">
                            <img class="object-cover w-32 h-20" src="{{ Storage::url($image->url) }}" alt="">
                            <x-jet-danger-button class="absolute right-2 top-2"
                                wire:click="deleteImage({{ $image->id }})" wire:loading.attr="disabled"
                                wire:target="deleteImage({{ $image->id }})">
                                x
                            </x-jet-danger-button>
                        </li>

                    @endforeach

                </ul>
            </section>

        @endif


        {{--@livewire('admin.status-product', ['product' => $product], key('status-product-' . $product->id))--}}

        {{-- <div class="p-6 bg-white rounded-lg shadow-xl">

        </div> --}}

        <div class="p-6 bg-white rounded-lg shadow-xl">
            <div class="grid grid-cols-2 gap-6 mb-4">

                {{-- Categoría --}}
                <div>
                    <x-jet-label value="Categorías" />
                    <select class="w-full form-control" wire:model="category_id">
                        <option value="" selected disabled>Seleccione una categoría</option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    <x-jet-input-error for="category_id" />
                </div>

                {{-- Subcategoría --}}
                <div>
                    <x-jet-label value="Subcategorías" />
                    <select class="w-full form-control" wire:model="product.subcategory_id">
                        <option value="" selected disabled>Seleccione una subcategoría</option>

                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                        @endforeach
                    </select>

                    <x-jet-input-error for="product.subcategory_id" />
                </div>
            </div>

            {{-- Nombre --}}
            <div class="mb-4">
                <x-jet-label value="Nombre" />
                <x-jet-input type="text" class="w-full" wire:model="product.name"
                    placeholder="Ingrese el nombre del producto" />
                <x-jet-input-error for="product.name" />
            </div>

            {{-- Slug --}}
            <div class="mb-4">
                <x-jet-label value="Slug" />
                <x-jet-input type="text" disabled wire:model="slug" class="w-full bg-gray-200"
                    placeholder="Ingrese el slug del producto" />

                <x-jet-input-error for="slug" />
            </div>

            {{-- Descrición --}}
            <div class="mb-4">
                <div wire:ignore>
                    <x-jet-label value="Descripción" />
                    <textarea class="w-full form-control" rows="4" wire:model="product.description" x-data x-init="ClassicEditor.create($refs.miEditor)
                        .then(function(editor){
                            editor.model.document.on('change:data', () => {
                                @this.set('product.description', editor.getData())
                            })
                        })
                        .catch( error => {
                            console.error( error );
                        } );" x-ref="miEditor">
                    </textarea>
                </div>
                <x-jet-input-error for="product.description" />
            </div>

            <div class="grid grid-cols-2 gap-6 mb-4">
                {{-- Marca --}}
                <div>
                    <x-jet-label value="Marca" />
                    <select class="w-full form-control" wire:model="product.brand_id">
                        <option value="" selected disabled>Seleccione una marca</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>

                    <x-jet-input-error for="product.brand_id" />
                </div>

                {{-- Precio --}}
                <div>
                    <x-jet-label value="Precio" />
                    <x-jet-input wire:model="product.price" type="number" class="w-full" step=".01" />
                    <x-jet-input-error for="product.price" />
                </div>
            </div>


            @if ($this->subcategory)


                @if (!$this->subcategory->color && !$this->subcategory->size)

                    <div>
                        <x-jet-label value="Cantidad" />
                        <x-jet-input wire:model="product.quantity" type="number" class="w-full" />
                        <x-jet-input-error for="product.quantity" />
                    </div>

                @endif

            @endif

            <div class="flex items-center justify-end mt-4">

                <x-jet-action-message class="mr-3" on="saved">
                    Actualizado
                </x-jet-action-message>

                <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save">
                    Actualizar producto
                </x-jet-button>
            </div>
        </div>


        @if ($this->subcategory)

            @if ($this->subcategory->size)

                {{--@livewire('admin.size-product', ['product' => $product], key('size-product-' . $product->id))--}}

            @elseif($this->subcategory->color)

                {{--@livewire('admin.color-product', ['product' => $product], key('color-product-' . $product->id))--}}

            @endif

        @endif


    </div>


    @push('script')
        <script>
            Dropzone.options.myAwesomeDropzone = {
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                dictDefaultMessage: "Arrastre una imagen al recuadro",
                acceptedFiles: 'image/*',
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 2, // MB
                complete: function(file) {
                    this.removeFile(file);
                },
                queuecomplete: function() {
                    Livewire.emit('refreshProduct');
                }
            };


            Livewire.on('deleteProduct', () => {

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('admin.edit-product', 'delete');

                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })

            })

            Livewire.on('deleteSize', sizeId => {

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('admin.size-product', 'delete', sizeId);

                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })

            })

            Livewire.on('deletePivot', pivot => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('admin.color-product', 'delete', pivot);

                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            })

            Livewire.on('deleteColorSize', pivot => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('admin.color-size', 'delete', pivot);

                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            })
        </script>
    @endpush

</div>
