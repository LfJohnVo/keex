<div>
    <div>
        <p class="text-xl text-gray-700">Talla:</p>
        <select class="w-full bg-white rounded-lg shadow-xl" wire:model="size_id">
            <option value="" selected disabled>Seleccione una talla</option>
            @foreach ($sizes as $size)
                <option value="{{$size->id}}">{{$size->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="mt-2">
        <p class="text-xl text-gray-700">Color:</p>
        <select class="w-full bg-white rounded-lg shadow-xl" wire:model="size_id">
            <option value="" selected disabled>Seleccione una color</option>
            @foreach ($colors as $color)
                <option value="{{$color->id}}">{{$color->name}}</option>
            @endforeach
        </select>
    </div>
</div>
