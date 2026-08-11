/*-----------------------------------------------------------------------------------

    Template Name: sasnio

    Note: This is Custom Js file

-----------------------------------------------------------------------------------

    [Table of contents]

    01. Owl Carousels
    02. Mobile Navigation
    03. Count
    04. Accordion
    05. Navbar Menu
    06. Fullscreen Menu
    07. Scroll Animation

-----------------------------------------------------------------------------------*/

jQuery(document).ready(function ($) {
    initializeMobileNavigation($);
    initializeCounters();
    initializeAccordion($);
    initializeNavbarMenu($);
    initializeFullscreenMenu($);


    $(window).on('scroll', addStickyToHeader);

});

/**
 * Show / Hide password
 */
function inputEyeLash(element) {

    const wrapper = element.closest('.password-field');

    const input = wrapper.querySelector('input');

    if (input.type === 'password') {

        input.type = 'text';

        element.classList.remove('fa-eye');
        element.classList.add('fa-eye-slash');

    } else {

        input.type = 'password';

        element.classList.remove('fa-eye-slash');
        element.classList.add('fa-eye');

    }
}

/** Make the header sticky on scroll  */
function addStickyToHeader() {
    const strickyMenu = $('.stricked-menu');

    if (!strickyMenu.length) {
        return;
    }

    const headerScrollPos = 1000;
    const currentScrollPosition = $(window).scrollTop();

    console.log(currentScrollPosition);


    if (currentScrollPosition > headerScrollPos) {
        strickyMenu.addClass('stricky-fixed shadow');
    } else {
        strickyMenu.removeClass('stricky-fixed shadow');
    }

}


/**
 * Mobile navigation
 */
function initializeMobileNavigation($) {
    $('.mobile-nav .menu-item-has-children').on('click', function () {
        $(this).toggleClass('active');
    });

    $('#nav-icon4').on('click', function () {
        $('#mobile-nav').toggleClass('open');
    });

    $('.bar-menu').on('click', function () {
        $('#mobile-nav')
            .toggleClass('open')
            .toggleClass('hmburger-menu')
            .show();
    });

    $('#res-cross').on('click', function () {
        $('#mobile-nav')
            .removeClass('open')
            .addClass('hmburger-menu');
    });
}


/**
 * Number counters
 */
function initializeCounters() {
    const counters = document.querySelectorAll('.count');
    const countersArray = Array.from(counters);

    countersArray.map(function (item) {
        let startNumber = 0;

        function counterUp() {
            startNumber++;
            item.innerHTML = startNumber;

            if (startNumber == item.dataset.number) {
                clearInterval(stop);
            }
        }

        const stop = setInterval(function () {
            counterUp();
        }, 10);
    });
}


/**
 * Accordion
 */
function initializeAccordion($) {
    $('.accordion-item .heading').on('click', function (event) {
        event.preventDefault();

        const accordionItem = $(this).closest('.accordion-item');

        if (accordionItem.hasClass('active')) {
            $('.accordion-item').removeClass('active');
        } else {
            $('.accordion-item').removeClass('active');
            accordionItem.addClass('active');
        }

        const content = $(this).next();

        content.slideToggle(300);

        $('.accordion-item .content')
            .not(content)
            .slideUp('fast');
    });
}


/**
 * Navbar dropdowns, search and collapse
 */
function initializeNavbarMenu($) {
    $('.navbar .dropdown').hover(
        function () {
            $(this)
                .find('.dropdown-menu')
                .addClass('show');
        },

        function () {
            $(this)
                .find('.dropdown-menu')
                .removeClass('show');
        }
    );

    $('.navbar .dropdown-item').hover(
        function () {
            $(this)
                .find('.dropdown-side')
                .addClass('show');
        },

        function () {
            $(this)
                .find('.dropdown-side')
                .removeClass('show');
        }
    );

    $('.navbar .search-form').on('click', '.search-icon', function () {
        const searchForm = $('.navbar .search-form');

        searchForm.toggleClass('open');

        if (searchForm.hasClass('open')) {
            $('.search-form .close-search').slideDown();
        } else {
            $('.search-form .close-search').slideUp();
        }
    });

    $('.navbar').on('click', '.navbar-toggler', function () {
        $('.navbar .navbar-collapse').toggleClass('show');
    });
}


/**
 * Fullscreen hamburger menu
 */
function initializeFullscreenMenu($) {
    let isOpen = false;

    const navDark = $('.topnav.dark');
    const logo = $('.topnav.dark .logo img');

    $('.topnav .menu-icon').on('click', function () {
        isOpen = !isOpen;

        $('.hamenu').toggleClass('open');

        if (isOpen) {
            $('.hamenu').animate({
                top: 0
            });

            $('.topnav .menu-icon').addClass('open');

            navDark.addClass('navlit');

            logo.attr('src', 'img/logo-light.png');
        } else {
            $('.hamenu')
                .delay(300)
                .animate({
                    top: '-100%'
                });

            $('.topnav .menu-icon').removeClass('open');

            navDark.removeClass('navlit');

            logo.attr('src', 'img/logo-dark.png');
        }
    });

    $('.hamenu .menu-links .main-menu > li .animsition-link').on(
        'click',
        function () {
            $('.hamenu').removeClass('open');
            $('.topnav .menu-icon').removeClass('open');

            isOpen = false;
        }
    );
}


/**
 * Check whether an element is visible
 */
function inVisible(element) {
    const windowTop = jQuery(window).scrollTop();
    const windowBottom = windowTop + jQuery(window).height();
    const elementTop = element.offset().top;
    const elementBottom = elementTop + element.height();

    if (
        elementBottom <= windowBottom &&
        elementTop >= windowTop
    ) {
        animateElement(element);
    }
}


/**
 * Animate numeric element
 */
function animateElement(element) {
    if (element.hasClass('ms-animated')) {
        return;
    }

    const maxValue = element.data('max');
    const originalHtml = element.html();

    element.addClass('ms-animated');

    jQuery({
        countNum: element.html()
    }).animate(
        {
            countNum: maxValue
        },
        {
            duration: 5000,
            easing: 'linear',

            step: function () {
                element.html(
                    Math.floor(this.countNum) + originalHtml
                );
            },

            complete: function () {
                element.html(
                    this.countNum + originalHtml
                );
            }
        }
    );
}
