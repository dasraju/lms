//STICKY MENU On Scroll
var height = $("#fixed").height();
$(window).scroll(function () {
  if ($(this).scrollTop() > height) {
    $("#fixed_top").addClass("fixed");
  } else {
    $("#fixed_top").removeClass("fixed");
  }
});

// BOTTOM TO TOP Button JS CODE
$(document).ready(function () {
    $(window).scroll(function () {
      if ($(window).scrollTop() > 300) {
        $("#bottom-to-top").css({
          opacity: "1",
          "pointer-events": "auto",
        });
      } else {
        $("#bottom-to-top").css({
          opacity: "0",
          "pointer-events": "none",
        });
      }
    });
    $("#bottom-to-top").click(function () {
      $("html").animate({ scrollTop: 0 }, 500);
    });
  });

  // Card Carousel
  $(".card_carousel .carousel .owl-carousel").owlCarousel({
    loop: true,
    autoplay: true,
    dots: true,
    responsive: {
      0: {
        items: 1,
      },
      575: {
        items: 2,
      },
      992: {
        items: 3,
      },
      1024: {
        items: 4,
      },
    },
  });