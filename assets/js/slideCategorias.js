// Slide Categorias

$('.categorias').slick({
  dots: false,
  variableWidth: true,
  prevArrow: '<button type="button" class="slick-prev justify-center flex">Previous</button>',
  nextArrow: '<button type="button" class="slick-next justify-center flex">Next</button>',
  infinite: false,
  speed: 300,
  slidesToShow: 8,
  slidesToScroll: 3,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 2,
        infinite: false
      }
    },
    {
      breakpoint: 640,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        arrows: false,
        infinite: false
      }
    }
  ]
});
