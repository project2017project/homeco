(function($) {
    "use strict";
     $(document).on('ready', function() {

		/*====================================
			Header Sticky JS
		======================================*/
		var activeSticky = $("#active-sticky"),
			winDow = $(window);
			winDow.on("scroll", function () {
				var scroll = $(window).scrollTop(),
				isSticky = activeSticky;
				if (scroll < 50) {
				isSticky.removeClass("is-sticky");
				} else {
				isSticky.addClass("is-sticky");
			}
		});

		/*====================================
			Select2 JS
		======================================*/
		$('.select2').select2();
        $('.select2noSearch').select2({
            minimumResultsForSearch: Infinity
        });
        
		/*====================================
			CounterUp JS
		======================================*/
		$('.counter').counterUp({
			time: 1500,
		});


		/*====================================
			Aos Animate JS
		======================================*/
		AOS.init({
			duration:1500,
			disable:!1,
			offset:0,
			once:!0,
			easing:"ease"
		});


		/*====================================
			Scrool To Top JS
		======================================*/
		var lastScrollTop = '';
		var scrollToTopBtn = '.scrollToTop'

		function stickyMenu($targetMenu, $toggleClass) {
			var st = $(window).scrollTop();
			if ($(window).scrollTop() > 600) {
				if (st > lastScrollTop) {
				$targetMenu.removeClass($toggleClass);

				} else {
				$targetMenu.addClass($toggleClass);
				};
			} else {
				$targetMenu.removeClass($toggleClass);
			};
		 	lastScrollTop = st;
		};

		$(window).on("scroll", function () {
		  stickyMenu($('.sticky-header'), "active");
		  if ($(this).scrollTop() > 400) {
			$(scrollToTopBtn).addClass('show');
		  } else {
			$(scrollToTopBtn).removeClass('show');
		  }
		});

		$(scrollToTopBtn).on('click', function (e) {
		  e.preventDefault();
		  $('html, body').animate({
			scrollTop: 0
		  }, 500);
		  return false;
		});

	});


		/*====================================
			Mobile Menu
		======================================*/
		var $offcanvasNav = $("#offcanvas-menu a");
			$offcanvasNav.on("click", function () {
				var link = $(this);
				var closestUl = link.closest("ul");
				var activeLinks = closestUl.find(".active");
				var closestLi = link.closest("li");
				var linkStatus = closestLi.hasClass("active");
				var count = 0;

			closestUl.find("ul").slideUp(function () {
				if (++count == closestUl.find("ul").length)
				activeLinks.removeClass("active");
			});
			if (!linkStatus) {
				closestLi.children("ul").slideDown();
				closestLi.addClass("active");
			}
		});

		/*====================================
			Preloader JS
		======================================*/
		$(window).on('load', function (event) {
			$('.preloader').delay(800).fadeOut(500);
		})


})(jQuery);

new ModalVideo('.js-video-btn');

const accordionItems = document.querySelectorAll('.accordion-item');
let activeItem = document.querySelector('.accordion-item.active');

accordionItems.forEach(item => {
  item.addEventListener('click', () => {
    if (item === activeItem) {
      item.classList.remove('active');
      activeItem = null;
    } else {
      if (activeItem) {
        activeItem.classList.remove('active');
      }
      item.classList.add('active');
      activeItem = item;
    }
  });
});



$(document).ready(function () {
    const tabLinks = $('.homec-list-tabs a');
    const stickyBar = $('.tabs-full-wrapper');
    const stickyHeight = stickyBar.outerHeight() || 80;
    const scrollOffset = 100;

    // Set first tab active by default
    tabLinks.removeClass('active').first().addClass('active');

    // Smooth scroll on tab click
    tabLinks.on('click', function (e) {
        e.preventDefault();
        const target = $($(this).attr('href'));
        if (target.length) {
            $('html, body').animate({
                scrollTop: target.offset().top - stickyHeight - 10
            }, 500);
        }
    });

    // Highlight active tab on scroll
    $(window).on('scroll', function () {
        const scrollTop = $(window).scrollTop() + stickyHeight + scrollOffset;

        let found = false;
        tabLinks.each(function () {
            const currLink = $(this);
            const targetSection = $(currLink.attr('href'));

            if (targetSection.length) {
                const sectionTop = targetSection.offset().top;
                const sectionBottom = sectionTop + targetSection.outerHeight();

                if (scrollTop >= sectionTop && scrollTop < sectionBottom) {
                    tabLinks.removeClass('active');
                    currLink.addClass('active');
                    found = true;
                    return false;
                }
            }
        });

        if (!found) {
            tabLinks.removeClass('active').first().addClass('active');
        }
    });
});

