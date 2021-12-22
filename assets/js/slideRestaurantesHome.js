// Slide Restaurantes

$('.restaurantesProximo').slick({
    dots: false,
    prevArrow: '<button type="button" class="slick-prev justify-center flex">Previous</button>',
    nextArrow: '<button type="button" class="slick-next justify-center flex">Next</button>',
    autoplay: false,
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          dots: false,
          infinite: false
        }
      },
      {
        breakpoint: 640,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: true,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 4000,
        }
      }
    ]
  });
    