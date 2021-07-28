<style>
    .bannerCard {
        height: 325px;
    }

</style>

<div>

    <div class="h-auto sliderAx bannerCard">
        <div id="slider-1" class="mx-auto">
            <div class="object-fill h-auto px-10 py-24 text-white bg-center bg-cover bannerCard"
                style="background-image: url(https://images.unsplash.com/photo-1544427920-c49ccfb85579?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1422&q=80)">
                <div class="md:w-1/2">
                    <div class="container md:w-1/2">
                        <p class="text-sm font-bold uppercase">Services</p>
                        <p class="text-3xl font-bold">Hello world</p>
                        <p class="mb-10 text-2xl leading-none">Carousel with TailwindCSS and jQuery</p>
                        <a href="#"
                            class="px-8 py-4 text-xs font-bold text-white uppercase bg-purple-800 rounded hover:bg-gray-200 hover:text-gray-800">Contact
                            us</a>
                    </div>
                </div>
            </div> <!-- container -->
            <br>
        </div>

        <div id="slider-2" class="mx-auto">
            <div class="object-fill h-auto px-10 py-24 text-white bg-top bg-cover bannerCard"
                style="background-image: url(https://images.unsplash.com/photo-1544144433-d50aff500b91?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80)">
                <div class="container">
                    <p class="text-sm font-bold uppercase">Services</p>
                    <p class="text-3xl font-bold">Hello world</p>
                    <p class="mb-10 text-2xl leading-none">Carousel with TailwindCSS and jQuery</p>
                    <a href="#"
                        class="px-8 py-4 text-xs font-bold text-white uppercase bg-purple-800 rounded hover:bg-gray-200 hover:text-gray-800">Contact
                        us</a>
                </div>
            </div> <!-- container -->
            <br>
        </div>
    </div>
    <div class="flex justify-between w-12 pb-2 mx-auto">
        <button id="sButton1" onclick="sliderButton1()" class="w-4 pb-2 bg-purple-400 rounded-full "></button>
        <button id="sButton2" onclick="sliderButton2() " class="w-4 p-2 bg-purple-400 rounded-full"></button>
    </div>
</div>


<script>
    var cont = 0;

    function loopSlider() {
        var xx = setInterval(function() {
            switch (cont) {
                case 0: {
                    $("#slider-1").fadeOut(400);
                    $("#slider-2").delay(400).fadeIn(400);
                    $("#sButton1").removeClass("bg-purple-800");
                    $("#sButton2").addClass("bg-purple-800");
                    cont = 1;

                    break;
                }
                case 1: {

                    $("#slider-2").fadeOut(400);
                    $("#slider-1").delay(400).fadeIn(400);
                    $("#sButton2").removeClass("bg-purple-800");
                    $("#sButton1").addClass("bg-purple-800");

                    cont = 0;

                    break;
                }


            }
        }, 4000);

    }

    function reinitLoop(time) {
        clearInterval(xx);
        setTimeout(loopSlider(), time);
    }



    function sliderButton1() {

        $("#slider-2").fadeOut(400);
        $("#slider-1").delay(400).fadeIn(400);
        $("#sButton2").removeClass("bg-purple-800");
        $("#sButton1").addClass("bg-purple-800");
        reinitLoop(4000);
        cont = 0

    }

    function sliderButton2() {
        $("#slider-1").fadeOut(400);
        $("#slider-2").delay(400).fadeIn(400);
        $("#sButton1").removeClass("bg-purple-800");
        $("#sButton2").addClass("bg-purple-800");
        reinitLoop(4000);
        cont = 1

    }

    $(window).ready(function() {
        $("#slider-2").hide();
        $("#sButton1").addClass("bg-purple-800");


        loopSlider();

    });
</script>
