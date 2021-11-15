export default function DataTables() {
    $('.data-table').DataTable({
        "aaSorting": [],
        "columnDefs": [
            {
                "searchable": false,
                "orderable": false,
                "lengthChange": false,
                "targets": 'no-filter'
            },
        ],
        "lengthChange": false,
        "pagingType": 'full_numbers',
        "language": {
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhuma entrada na tabela",
            "search": "_INPUT_",
            "searchPlaceholder": "Procurar...",
            "zeroRecords": "Nenhum dado encontrado",
            "infoFiltered":   "(filtrado de _MAX_ no total)",
            "paginate": {
                "first":    '‹‹',
                "previous": '‹',
                "next":     '›',
                "last":     '››'
            }
        },
        "dom": "<'row'<'col-sm-6'f><'col-sm-6'p>>" +
               "<'row'<'col-sm-12'tr>>"
    });

    $('.dataTables_filter').css('text-align', 'left').find('input').removeClass('input-sm').css('margin-left', 0);
};
