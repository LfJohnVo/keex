<x-app-layout>

    <div class="glider-contain">
        <div class="banner">
            <div>
                <img class="w-full sm:h-200 lg:h-50 h-100 hover"
                    src="https://multitecnologiavyv.com/wp-content/uploads/2019/10/banner-audifonos-multi-tecnologia-ecuador-quito.jpg">
            </div>
            <div>
                <img class="w-full sm:h-200 lg:h-50 h-100 hover"
                    src="http://www8.hp.com/lamerica_nsc_carib/en/images/laptops_hero_banner_updated_v3_tcm246_2255541_tcm246_2255589_tcm246-2255541.jpg">
            </div>
            <div>
                <img class="w-full sm:h-200 lg:h-50 h-100 hover"
                    src="https://www.didomenicodesign.com/wp-content/uploads/2015/05/paralax-holiday-banner1.jpg">
            </div>
            <div>
                <img class="w-full sm:h-200 lg:h-50 h-100 hover"
                    src="https://d107a8nc3g2c4h.cloudfront.net/images/blog/wp-content/uploads/Subnet-Mask-PS4-banner.jpg">
            </div>
        </div>

        <div role="tablist" class="bannerdots"></div>

        <div class="container py-8">

            @foreach ($categories as $category)

                <section class="mb-6">

                    <h1 class="py-1 text-lg font-semibold text-gray-700 uppercase ">
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

                    //banner
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
                                    slidesToShow: 2.5,
                                    slidesToScroll: 2,
                                }
                            },
                            {
                                breakpoint: 768,
                                settings: {
                                    slidesToShow: 3.5,
                                    slidesToScroll: 3,
                                }
                            },
                            {
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 4.5,
                                    slidesToScroll: 4,
                                }
                            },
                            {
                                breakpoint: 1280,
                                settings: {
                                    slidesToShow: 5.5,
                                    slidesToScroll: 5,
                                }
                            },
                        ]
                    });

                });
            </script>
        @endpush

</x-app-layout>
