(function ($) {
    "use strict";
   

$('.wpn-video-car').owlCarousel({
    stagePadding: 200,
    loop: true,
    margin: 10,
    dots: true,
    nav: false,
    responsive: {
        0: {
            items: 1,
            stagePadding: 60
        },
        600: {
            items: 1,
            stagePadding: 100
        },
        1000: {
            items: 1,
            stagePadding: 200
        },
        1200: {
            items: 1,
            stagePadding: 250
        },
        1400: {
            items: 1,
            stagePadding: 300
        }

    }
})

    MediaBox('.mediabox');

}(jQuery)); 