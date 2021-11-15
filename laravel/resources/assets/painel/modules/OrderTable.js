export default function OrderTable() {
    $('.table-sortable tbody').sortable({
        update: function () {
            var url   = $('base').attr('href') + '/painel/order',
                data  = [],
                table = $('.table-sortable').attr('data-table');

            $('.table-sortable tbody').children('tr').each(function(index, el) {
                data.push(el.id)
            });

            $.post(url, { data: data, table: table });
        },
        handle: $('.btn-move')
    }).disableSelection();
};
