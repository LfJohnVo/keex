<style>
    .flickity-viewport {
        height: 300px !important;
        width: 100%;
    }

</style>
<div wire:init="loadPosts">

    <div class="flex items-center justify-center w-full h-auto mt-2 text-white bg-center bg-cover"
        x-data="carouselFilter()">
        <div class="container grid grid-cols-1">
            <div class="col-start-1 row-start-2" x-show="active == 0"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-90">
                <div class="grid grid-cols-1 grid-rows-1" x-data="carousel()" x-init="init()">
                    <div
                        class="relative z-20 flex items-center justify-center col-start-1 row-start-1 pointer-events-none">

                        <h1 class="absolute text-5xl font-black tracking-widest uppercase" x-show="active == 0"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform translate-y-12"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            x-transition:leave="transition ease-out duration-300"
                            x-transition:leave-start="opacity-100 transform translate-y-0"
                            x-transition:leave-end="opacity-0 transform -translate-y-12">Dragon Fruit</h1>
                        <h1 class="absolute text-5xl font-black tracking-widest uppercase" x-show="active == 1"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform translate-y-12"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            x-transition:leave="transition ease-out duration-300"
                            x-transition:leave-start="opacity-100 transform translate-y-0"
                            x-transition:leave-end="opacity-0 transform -translate-y-12">Avocado</h1>
                        <h1 class="absolute text-5xl font-black tracking-widest uppercase" x-show="active == 2"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform translate-y-12"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            x-transition:leave="transition ease-out duration-300"
                            x-transition:leave-start="opacity-100 transform translate-y-0"
                            x-transition:leave-end="opacity-0 transform -translate-y-12">Mango</h1>
                        <h1 class="absolute text-5xl font-black tracking-widest uppercase" x-show="active == 3"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform translate-y-12"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            x-transition:leave="transition ease-out duration-300"
                            x-transition:leave-start="opacity-100 transform translate-y-0"
                            x-transition:leave-end="opacity-0 transform -translate-y-12">Orange</h1>
                    </div>


                    <div class="col-start-1 row-start-1 carousel" x-ref="carousel">
                        <div class="w-3/5 px-2">
                            <img src="https://images.unsplash.com/photo-1581375221876-8f287f7cd2cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=770&q=80"
                                loading="lazy">
                        </div>
                        <div class="w-3/5 px-2">
                            <img src="https://images.unsplash.com/photo-1581375279144-bb3b381c7046?ixlib=rb-1.2.1&auto=format&fit=crop&w=770&q=80"
                                loading="lazy">
                        </div>
                        <div class="w-3/5 px-2">
                            <img src="https://images.unsplash.com/photo-1581375303816-4a17124934f7?ixlib=rb-1.2.1&auto=format&fit=crop&w=770&q=80"
                                loading="lazy">
                        </div>
                        <div class="w-3/5 px-2">
                            <img src="https://images.unsplash.com/photo-1494253109108-2e30c049369b?ixlib=rb-1.2.1&auto=format&fit=crop&w=770&q=80"
                                loading="lazy">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
