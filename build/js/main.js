var lastScroll = 0;

// open menu
$(document).on("click", ".menu-toggle", function() {
  $("body").addClass("show-menu");
});

// close menu
$(document).on("click", ".close-menu", function() {
  $("body").removeClass("show-menu");
});

function setOverlayImageSize() {
  $(document).imagesLoaded(function() {
    var imageHeight = $(".image-box-image").outerHeight();
    var sectionPadding = $(".image-overlay-box").css("padding-top");
    $(".image-box-image")
      .closest(".image-overlay-box")
      .css("height", imageHeight / 2 + parseInt(sectionPadding) + "px");
    $(".image-overlay-box + section").css("padding-top", imageHeight / 2 + 70);
  });
}

function setMenuImageSize() {
  if ($(document).width() >= 992) {
    var boxPadding = parseInt($(".menu-feature-box").css("padding-left"));
    var wrapperPadding = parseInt(
      $(".menu-feature-box .menu-feature-box-wrapper").css("padding-left")
    );
    var imageMaxWidth = $(".menu-feature-box").outerWidth() - boxPadding;
    $(".menu-feature-box .box-image img").css({
      "max-width": imageMaxWidth,
      transform: "translateX(-" + (boxPadding + wrapperPadding) + "px)"
    });
  } else {
    $(".menu-feature-box .box-image img").css({
      "max-width": "",
      transform: ""
    });
  }
}

$(document).ready(function() {
  setMenuImageSize();
  setOverlayImageSize();
  // slider settings
  var bannerSlider = new Swiper(".banner-slider", {
    pagination: {
      el: ".swiper-pagination-vertical",
      clickable: true,
      renderBullet: function(index, className) {
        return '<span class="' + className + '">' + pad(index + 1) + "</span>";
      }
    },
    loop: true,
    direction: "vertical",
    autoplay: {
      delay: 3000
    },
    grabCursor: true,
    breakpoints: {
      767: {
        grabCursor: false
      }
    }
  });

  var featuresSlider = new Swiper(".features-slider", {
    pagination: {
      el: ".swiper-pagination-square",
      clickable: true
    },
    loop: true,
    autoplay: {
      delay: 3000
    }
  });

  var tesimonialsSlider = new Swiper(".tesimonials-slider", {
    pagination: {
      el: ".swiper-tesimonials-pagination",
      clickable: true
    },
    loop: true,
    autoplay: {
      delay: 3000
    }
  });

  var clientSlider = new Swiper(".client-slider", {
    slidesPerView: 3,
    spaceBetween: 30,
    pagination: {
      el: ".swiper-pagination",
      clickable: true
    },
    loop: true,
    autoplay: {
      delay: 3000
    },
    breakpoints: {
      991: {
        slidesPerView: 2,
        spaceBetween: 20
      },
      767: {
        slidesPerView: 2,
        spaceBetween: 10
      },
      460: {
        slidesPerView: 1,
        spaceBetween: 0
      }
    }
  });

  var workSlider = new Swiper(".work-slider", {
    slidesPerView: 1,
    pagination: {
      el: ".work-slider-pagination",
      clickable: true
    },
    loop: true,
    autoplay: {
      delay: 3000
    }
  });

  // wow animation
  var wow = new WOW({
    offset: 80, // distance to the element when triggering the animation (default is 0)
    mobile: false, // trigger animations on mobile devices (default is true)
    live: true, // act on asynchronously loaded content (default is true)
    resetAnimation: true // reset animation on end (default is true)
  });
  wow.init();

  // justify gallery
  $(document).imagesLoaded(function() {
    if ($(".justified-gallery").length > 0) {
      $(".justified-gallery").justifiedGallery({
        rowHeight: 250,
        maxRowHeight: false,
        captions: true,
        margins: 20,
        waitThumbnailsLoad: true,
        lastRow: "justify"
      });
    }
  });

  // isotop layout
  var $portfolio = $(".portfolio-grid");
  $portfolio.imagesLoaded(function() {
    $portfolio.isotope({
      layoutMode: "masonry",
      itemSelector: ".grid-item",
      percentPosition: true,
      masonry: {
        columnWidth: ".grid-sizer"
      }
    });
    $portfolio.isotope();
  });
});

$(window).resize(function() {
  setMenuImageSize();
  setOverlayImageSize();
});

// add sticky class on scroll
$(window).on("scroll", init_scroll_navigate);
function init_scroll_navigate() {
  var headerHeight = $("nav").outerHeight();
  if (!$("header").hasClass("no-sticky")) {
    if ($(document).scrollTop() >= headerHeight) {
      $("header").addClass("sticky");
    } else if ($(document).scrollTop() <= headerHeight) {
      $("header").removeClass("sticky");
    }
  }

  var st = $(this).scrollTop();
  if (st > lastScroll) {
    $(".sticky").removeClass("header-appear");
  } else {
    $(".sticky").addClass("header-appear");
  }
  lastScroll = st;
  if (lastScroll <= headerHeight) {
    $("header").removeClass("header-appear");
  }
}
