export default function MobileToggle() {
    var $handle = $('#mobile-toggle'),
        $nav    = $('#nav-mobile');

    $handle.on('click touchstart', function(event) {
        event.preventDefault();
        $nav.slideToggle();
        $handle.toggleClass('close');
    });
};
