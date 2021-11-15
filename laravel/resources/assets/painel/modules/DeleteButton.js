export default function DeleteButton() {
    $('body').on('click', '.btn-delete', function(event) {
        event.preventDefault();

        var form    = $(this).closest('form'),
            _this   = this,
            message = $(this).hasClass('btn-delete-multiple')
                ? 'Deseja excluir todos os registros?'
                : 'Deseja excluir o registro?';

        bootbox.confirm({
            size: 'small',
            backdrop: true,
            message: message,
            buttons: {
                'cancel': {
                    label: 'Cancelar',
                    className: 'btn-default btn-sm'
                },
                'confirm': {
                    label: '<span class="glyphicon glyphicon-remove" style="margin-right:10px;"></span>Excluir',
                    className: 'btn-primary btn-danger btn-sm'
                }
            },
            callback: function(result) {
                if (result) {
                    if ($(_this).hasClass('btn-delete-link')) return window.location.href = $(_this)[0].href;
                    form.submit();
                }
            }
        });
    });
};
