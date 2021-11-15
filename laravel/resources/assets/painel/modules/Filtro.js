export default function Filtro() {
    $('#filtro-select').on('change', function () {
        var id    = $(this).val(),
            base  = $('base').attr('href'),
            route = $(this).data('route');

        if (id) {
            window.location = `${base}/${route}?filtro=${id}`;
        } else {
            window.location = `${base}/${route}`;
        }
    });
};
