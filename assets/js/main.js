$(document).ready(function () {
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

    $("#management_Slider").owlCarousel({
        margin:20,
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
    
    $("#policy_Slider").owlCarousel({
        margin:20,
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
    $("#information_Slider").owlCarousel({
        margin:20,
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

$(window).scroll(function(){if ($(this).scrollTop() >= 50){$('#return-to-top').fadeIn(200);} else{$('#return-to-top').fadeOut(200);}}); 
$('#return-to-top').click(function(){$('body,html').animate({scrollTop : 0 }, 500);});  

})