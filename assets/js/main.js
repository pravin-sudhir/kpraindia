$(document).ready(function () {
    $("#featured_Slider").owlCarousel({
        margin: 20,
        nav: true,
        dots: false,
        autoplay: true,
        loop: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
    $("#Testimonials_Slider").owlCarousel({
        margin: 20,
        nav: true,
        dots: false,
        autoplay: true,
        loop: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });
    $("#Smart_consult_Slider").owlCarousel({
        margin: 20,
        nav: false,
        dots: false,
        autoplay: true,
        loop: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });
    $("#Smart_banner_Slider").owlCarousel({
        nav: false,
        dots: false,
        autoplay: true,
        loop: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
})