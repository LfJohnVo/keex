<x-app-layout>

    <div class="container py-8">
        @foreach ($categories as $category)

            <section class="mb-6">
                <h1 class="text-lg font-semibold text-gray-700 uppercase">
                    {{ $category->name }}
                </h1>

                @livewire('category-products', ['category' => $category])
            </section>

        @endforeach
    </div>


    @push('script')
        <script>
            //listen render event receive id from product
            Livewire.on('glider', function(id) {

                new Glider(document.querySelector('.glider-' + id), {
                    slidesToShow: 5,
                    slidesToScroll: 5,
                    draggable: true,
                    dots: '.dots',
                    arrows: {
                        prev: '.glider-prev',
                        next: '.glider-next'
                    }
                });

            });
        </script>
    @endpush

</x-app-layout>
