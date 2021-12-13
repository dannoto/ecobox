// Slide Banners Home

$('.bannersHome').slick({
    dots: false,
    prevArrow: '<button type="button" class="slick-prev justify-center flex">Previous</button>',
    nextArrow: '<button type="button" class="slick-next justify-center flex">Next</button>',
    infinite: false,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: false
        }
      },
      {
        breakpoint: 640,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          infinite: false
        }
      }
    ]
  });
  