<x-app-layout>
    <link href="https://unpkg.com/flickity@2/dist/flickity.min.css" rel="stylesheet">

    @livewire('banner')

    <div class="container py-8">

        @foreach ($categories as $category)

            <section class="mb-6">
                <div class="flex items-center mb-2">
                    <h1 class="py-1 text-lg font-semibold text-gray-700 uppercase ">
                        {{ $category->name }}
                    </h1>
                    <a class="ml-2 font-semibold text-blue-500 hover:text-blue-400 hover:underline"
                        href="{{ route('categories.show', $category) }}">Ver más</a>

                </div>
                @livewire('category-products', ['category' => $category])
            </section>

        @endforeach
    </div>


    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    @push('script')
        <script>
            //listen render event receive id from product
            Livewire.on('glider', function(id) {
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

            //banner
            function carousel() {
                return {
                    active: 0,
                    init() {
                        var flkty = new Flickity(this.$refs.carousel, {
                            wrapAround: true,
                            autoPlay: 2000,
                            pauseAutoPlayOnHover: true,
                            fullscreen: false,
                            fade: true,
                        });
                        flkty.on('change', i => this.active = i);
                    }
                }
            }

            function carouselFilter() {
                return {
                    active: 0,
                    changeActive(i) {
                        this.active = i;

                        this.$nextTick(() => {
                            let flkty = Flickity.data(this.$el.querySelectorAll('.carousel')[i]);
                            //flkty.resize();

                            //console.log(flkty);
                        });
                    }
                }
            }
        </script>
    @endpush

</x-app-layout>
