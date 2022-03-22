$(".center").slick({
  centerMode: true,
  centerPadding: "30px",
  slidesToShow: 3,
  dots: false,

  responsive: [
    {
      breakpoint: 992,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: "0px",
        slidesToShow: 1,
      },
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: "0px",
        slidesToShow: 1,
      },
    },
  ],
});

$(window).scroll(function () {
  var scrollPos = $(document).scrollTop();
  if (scrollPos > 150) {
    $(".header__bottom").addClass("sticky-fixed");
  } else if (scrollPos < 140) {
    $(".header__bottom").removeClass("sticky-fixed");
  }
});
$(".dropdown").hover(function () {
  var dropdownMenu = $(this).children(".dropdown-menu");
  if (dropdownMenu.is(":visible")) {
    dropdownMenu.parent().toggleClass("open");
  }
});

$(".brand-company").slick({
  autoplay: true,
  autoplaySpeed: 500,
  arrows: false,
  prevArrow: '<button type="button" class="slick-prev"></button>',
  nextArrow: '<button type="button" class="slick-next"></button>',
  centerMode: true,
  slidesToShow: 5,
  slidesToScroll: 1,
});

$(".ourTeam").slick({
  autoplay: true,
  autoplaySpeed: 2500,
  arrows: true,
  prevArrow: '<button type="button" class="slick-prev"></button>',
  nextArrow: '<button type="button" class="slick-next"></button>',

  slidesToShow: 3,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 992,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: "0px",
        slidesToShow: 1,
      },
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: "0px",
        slidesToShow: 1,
      },
    },
  ],
});

$(".scroll-to-top").click(function () {
  $("html, body").animate({ scrollTop: 0 }, 600);
  return false
});
