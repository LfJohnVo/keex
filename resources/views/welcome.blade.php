<x-app-layout>

    @livewire('banner')
    <link href="https://unpkg.com/tailwindcss@2.2.4/dist/tailwind.min.css" rel="stylesheet">

    <div class="container py-8">

        @foreach ($categories as $category)

            <section class="mb-6">
                <div class="flex items-center mb-2">
                    <h1 class="py-1 text-lg font-semibold text-gray-700 uppercase ">
                        {{ $category->name }}
                    </h1>
                    <a class="ml-2 font-semibold text-blue-500 hover:text-blue-400 hover:underline" href="{{ route('categories.show', $category) }}">Ver más</a>

                </div>
                @livewire('category-products', ['category' => $category])
            </section>

        @endforeach
    </div>


    @push('script')
        <script>
            //listen render event receive id from product
            Livewire.on('glider', function(id) {

                //banner
                $(document).ready(function() {
                    new Glider(document.querySelector('.banner'), {
                        draggable: true,
                    });

                    const banner = new Glider(document.querySelector('.banner'));

                    function sliderAuto(slider, miliseconds) {
                        const slidesCount = slider.track.childElementCount;
                        let slideTimeout = null;
                        let nextIndex = 1;

                        function slide() {
                            slideTimeout = setTimeout(
                                function() {
                                    if (nextIndex >= slidesCount) {
                                        nextIndex = 0;
                                    }
                                    slider.scrollItem(nextIndex++);
                                },
                                miliseconds
                            );
                        }

                        slider.ele.addEventListener('glider-animated', function() {
                            window.clearInterval(slideTimeout);
                            slide();
                        });

                        slide();
                    }

                    sliderAuto(banner, 3000)

                });

                //sliders
                new Glider(document.querySelector('.glider-' + id), {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    draggable: true,
                    dots: '.glider-' + id + '~ .dots',
                    arrows: {
                        prev: '.glider-' + id + '~ .glider-prev',
                        next: '.glider-' + id + '~ .glider-next'
                    },
                    responsive: [{
                            breakpoint: 640,
                            settings: {
                                slidesToShow: 1.5,
                                slidesToScroll: 1,
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 2.5,
                                slidesToScroll: 2,
                            }
                        },
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 3.5,
                                slidesToScroll: 3,
                            }
                        },
                        {
                            breakpoint: 1280,
                            settings: {
                                slidesToShow: 4.5,
                                slidesToScroll: 4,
                            }
                        },
                    ]
                });

            });
        </script>
    @endpush

</x-app-layout>
