@props(['category'])

<div class="grid grid-cols-4 px-4 py-4">
    <div>
        <p class="mb-3 font-bold text-center text-gray-500">Subcategorias</p>
        <ul>
            @foreach ($category->subcategories as $subcategory)
                <li>
                    <a href="{{route('categories.show', $category) . '?subcategoria=' . $subcategory->slug}}" class="inline-block px-4 py-1 font-semibold text-gray-500 hover:text-purple-600">
                        {{ $subcategory->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="col-span-3 ">
        <img class="object-cover object-center w-full h-64" src="{{ Storage::url($category->image) }}" alt="">
    </div>
</div>
