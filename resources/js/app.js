import './bootstrap';

$(document).foundation();

var swiper = new Swiper('.swiper-container', {
    slidesPerView: 3,
    spaceBetween: 30,
    pagination: {
      el: '.swiper-pagination',
      clickable: true
    },
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
});

$('.count').each(function () {
    var $this = $(this);
    jQuery({ Counter: 0 }).animate({ Counter: $this.attr('data-stop') }, {
      duration: 1000,
      easing: 'swing',
      step: function (now) {
        $this.text(Math.ceil(now));
      }
    });
});