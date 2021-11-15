import axios from 'axios';

import AjaxSetup from './AjaxSetup';
import MobileToggle from './MobileToggle';

AjaxSetup();
MobileToggle();

$('.banners').cycle({
    slides: '>.slide',
});

$('.scroll-down').click(event => {
    event.preventDefault();

    $('html, body').animate(
        {
            scrollTop: $('.banners').offset().top + $('.banners').height(),
        },
        1000
    );
});

window.Rellax('.rellax');

function getInstagramImages() {
    const url = 'https://www.instagram.com/deborahroig8/?__a=1';

    axios.get(url).then(({ data }) => {
        try {
            const { edges } = data.graphql.user.edge_owner_to_timeline_media;

            const pictures = edges.slice(0, 6).map(({ node }) => ({
                url: `https://instagram.com/p/${node.shortcode}`,
                thumbnail: node.thumbnail_resources[4].src,
            }));

            const $picturesDiv = $(`<div class="pictures"></div>`).append(
                pictures.map(
                    p =>
                        `<a href="${p.url}" target="_blank"><img src="${p.thumbnail}" /></a>`
                )
            );

            $('.home .instagram .center').append($picturesDiv);
        } catch (err) {
            console.error(err);
        }
    });
}

if ($('.home .instagram').length) {
    getInstagramImages();
}

function prepareMedia() {
    $('.fancybox-video')
        .off('click.fb-start')
        .fancybox({
            live: false,
            padding: 0,
            type: 'iframe',
            width: 800,
            height: 450,
            aspectRatio: true,
        });

    $('.fancybox')
        .off('click.fb-start')
        .fancybox({
            live: false,
            padding: 30,
        });
}

$(document).on('click', '.fancybox-gallery', function gallery(event) {
    event.preventDefault();

    const id = $(this).data('gallery');

    if (id) $(`.fancybox[rel=${id}]:eq(0)`).click();
});

prepareMedia();

$('.load-more').click(function loadMore(event) {
    event.preventDefault();

    if ($(this).hasClass('loading')) return;

    $(this).addClass('loading');

    axios
        .get($(this).data('next'))
        .then(({ data }) => {
            const { view, next } = data;

            const $container = $(this).prev();
            const $items = $(view);

            $container.append($items);

            if ($container.hasClass('masonry')) {
                $container.masonry('appended', $items);
                $container.imagesLoaded().progress(() => {
                    $container.masonry('layout');
                });
            }

            prepareMedia();

            if (next) {
                $(this).data('next', next);
            } else {
                $(this).remove();
            }
        })
        .finally(() => $(this).removeClass('loading'));
});

const $grid = $('.masonry');

if ($grid.length) {
    $grid.masonry({
        itemSelector: '.thumb',
        columnWidth: '.sizer',
        gutter: '.gutter',
        percentPosition: true,
    });

    $grid.imagesLoaded(() => {
        $grid.masonry('layout');
    });
}

function positionCategorias() {
    const $wrapper = $('.categorias');
    const $active = $wrapper.find('.active');

    const translate =
        $active.width() / 2 + $active.offset().left - $wrapper.offset().left;

    $wrapper.css('transform', `translateX(-${translate}px)`);
}

if ($('.categorias').length) {
    positionCategorias();
    setInterval(positionCategorias, 200);
}

// AVISO DE COOKIES
$(".aviso-cookies").show();

$(".aceitar-cookies").click(function () {
  var url = window.location.origin + "/aceite-de-cookies";

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

  // PROJETOS/IMAGENS - BTN SCROLL TOP
  $(document).scroll(function (e) {
    e.preventDefault();
    $(".link-topo").toggle($(document).scrollTop() !== 0);
  });
  $(".link-topo").click(function (e) {
    e.preventDefault();
    $("html, body").animate({ scrollTop: $("body").offset().top }, 500);
});



// // Hover de whatsapp
// var whatsapp_box = $("#telefone");
// whatsapp_box.addEventListener("mouseover", mouseOver, false);
// whatsapp_box.addEventListener("mouseout", mouseOut, false);


// function mouseOver() {
//    var whats_color = $("#whatsapp");
//    whats_color.classList.add("whatsapp_color");
//    console.log("over");
// }

// function mouseOut() {
//    var whats_vazio = $("#whatsapp");
//    whats_vazio.classList.remove("whatsapp_color");
//    console.log("out");
// }

// const telefone = document.querySelector('#telefone')

// telefone.addEventListener('mouseenter', () => {
//   console.log('opa')
// })

// var el13 = $("#telefone");
// if(el13){
//     console.log("el13 ta on");
// }else{
//     console.log("el13 ta off");
// }