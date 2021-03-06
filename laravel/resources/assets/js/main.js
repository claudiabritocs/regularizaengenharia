import axios from 'axios';

import AjaxSetup from './AjaxSetup';
import MobileToggle from './MobileToggle';

AjaxSetup();
MobileToggle();

$('.banners').cycle({
    slides: '>.slide',
});

// function prepareMedia() {
//     $('.fancybox-video')
//         .off('click.fb-start')
//         .fancybox({
//             live: false,
//             padding: 0,
//             type: 'iframe',
//             width: 800,
//             height: 450,
//             aspectRatio: true,
//         });

//     $('.fancybox')
//         .off('click.fb-start')
//         .fancybox({
//             live: false,
//             padding: 30,
//         });
// }

// $(document).on('click', '.fancybox-gallery', function gallery(event) {
//     event.preventDefault();

//     const id = $(this).data('gallery');

//     if (id) $(`.fancybox[rel=${id}]:eq(0)`).click();
// });

// prepareMedia();

// $('.load-more').click(function loadMore(event) {
//     event.preventDefault();

//     if ($(this).hasClass('loading')) return;

//     $(this).addClass('loading');

//     axios
//         .get($(this).data('next'))
//         .then(({ data }) => {
//             const { view, next } = data;

//             const $container = $(this).prev();
//             const $items = $(view);

//             $container.append($items);

//             if ($container.hasClass('masonry')) {
//                 $container.masonry('appended', $items);
//                 $container.imagesLoaded().progress(() => {
//                     $container.masonry('layout');
//                 });
//             }

//             prepareMedia();

//             if (next) {
//                 $(this).data('next', next);
//             } else {
//                 $(this).remove();
//             }
//         })
//         .finally(() => $(this).removeClass('loading'));
// });

// const $grid = $('.masonry');

// if ($grid.length) {
//     $grid.masonry({
//         itemSelector: '.thumb',
//         columnWidth: '.sizer',
//         gutter: '.gutter',
//         percentPosition: true,
//     });

//     $grid.imagesLoaded(() => {
//         $grid.masonry('layout');
//     });
// }

// function positionCategorias() {
//     const $wrapper = $('.categorias');
//     const $active = $wrapper.find('.active');

//     const translate =
//         $active.width() / 2 + $active.offset().left - $wrapper.offset().left;

//     $wrapper.css('transform', `translateX(-${translate}px)`);
// }

// if ($('.categorias').length) {
//     positionCategorias();
//     setInterval(positionCategorias, 200);
// }

// Hover de submenu termos

function toggleButton() {
    var subMenu = document.getElementById("dropdown-content");
    
    if(subMenu.style.display == "none") {
        subMenu.style.display = "block";
    } else if (subMenu.style.display == "block") {
        subMenu.style.display = "none";
    } else {
        subMenu.style.display = "block";
    }
    }
   
var termos = document.getElementById("termos");
termos.addEventListener("click", toggleButton, false);

// MenuBurger

var botao = document.getElementById("menuburger");
botao.addEventListener("click", abrirBurger, false);

function abrirBurger() {
    var temp = document.getElementById("menuburgerlist");
    temp.classList.toggle("menuburgerlist");
}


//EFFEITOS

document.addEventListener("DOMContentLoaded", function(event) {
    document.addEventListener("scroll", function(event) {
        const animatedBoxes = document.getElementsByClassName("cards-sons");
        const windowOffsetTop = window.innerHeight + window.scrollY;

        Array.prototype.forEach.call(animatedBoxes, (animatedBox) => {
            const animatedBoxOffsetTop = animatedBox.offsetTop;

            if (windowOffsetTop >= animatedBoxOffsetTop) {
                addClass(animatedBox, "cards-sons2");
            }
        });
    });
});

function addClass(element, className) {
    const arrayClasses = element.className.split(" ");
    if (arrayClasses.indexOf(className) === -1) {
        element.className += " " + className;
    }
}

// Whatsapp Btns

function whatsWin() {
    var whatschoose = document.getElementById("whatsbox");
    console.log("Chegou 1 step");
    if(whatschoose.style.display == "none") {
        whatschoose.style.display = "block";
    } else if (whatschoose.style.display == "block") {
        whatschoose.style.display = "none";
    } else {
        whatschoose.style.display = "block";
    }
}


var whatsButton = document.getElementById("btn-Whats");
whatsButton.addEventListener("click", whatsWin, false);

var whatsButton2 = document.getElementById("btn-Whats2");
whatsButton2.addEventListener("click", whatsWin, false);

var whatsButtonClose = document.getElementById("fa-times");
whatsButtonClose.addEventListener("click", whatsWin, true);

// AVISO DE COOKIES
$(".aviso-cookies").show();

$(".aceitar-cookies").click(function () {
var url = window.location.origin + window.location.pathname +"/aceite-de-cookies";

$.ajax({
    type: "POST",
    url: url,
    success: function (data, textStatus, jqXHR) {
    $(".aviso-cookies").hide();
    },
    error: function (jqXHR, textStatus, errorThrown) {
    console.log(jqXHR, textStatus, errorThrown);
    },
    });
});