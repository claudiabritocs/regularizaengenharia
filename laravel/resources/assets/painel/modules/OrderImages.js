export default function OrderImages() {
    var $wrapper = $('#imagens');

    $wrapper.sortable({
        update: function () {
            var url   = $('base').attr('href') + '/painel/order',
                data  = [],
                table = $wrapper.attr('data-table');

            $wrapper.children('.imagem').each(function(index, el) {
                el.dataset.ordem = index + 1;
                $(el).data('ordem', index + 1);
                data.push(el.id);
            });

            $.post(url, { data: data, table: table });
        },
        handle: '> img'
    }).disableSelection();
};
