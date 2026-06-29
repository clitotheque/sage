import $ from 'jquery'
import 'slick-carousel'

// https://github.com/kenwheeler/slick/issues/4350#issuecomment-3977205377
// $.type = function (value) {
//   return typeof (value)
// }

/* Menu button */
// $('#menu-switch').click(() => $('#c-menu').toggleClass('open'));

// $('.check_age').click((e) => {
//   const message = $(this).context.activeElement.dataset.message;
//   if (!confirm(message.replace(".", ".\r\n"))) {
//     e.preventDefault();
//   }
// });

$("#featured_slider").slick({
  infinite: true,
  arrows: true,
  autoplay: true,
  mobileFirst: true,
  autoplaySpeed: 3000,
  slidesToShow: 1,
  slidesToScroll: 1,
  swipeToSlide: true,
  responsive: [{
    breakpoint: 2000,
    settings: {
      slidesToShow: 5
    }
  }, {
    breakpoint: 1500,
    settings: {
      slidesToShow: 4
    }
  }, {
    breakpoint: 1050,
    settings: {
      slidesToShow: 3
    }
  }, {
    breakpoint: 630,
    settings: {
      slidesToShow: 2
    }
  }]
});
