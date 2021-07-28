<x-app-layout>

    <div class="container py-8">
        <figure class="mb-4">
            <img class="object-cover object-center w-full h-80" src="{{ Storage::url($category->image) }}"
                alt="{{ $category->name }}">
        </figure>

        @livewire('category-filter', ['category' => $category])

    </div>

</x-app-layout>
