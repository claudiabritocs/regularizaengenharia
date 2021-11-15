export default function GeneratorFields() {
    $('.btn-create-field').click(function(e) {
        e.preventDefault();
        var field;

        field  = '<div class="row" style="padding: 10px 0 0">';
        field += '<div class="col-md-4 col-nome"><label>Nome</label>';
        field += '<input class="form-control" type="text" name="campos_nome[]"></div>';
        field += '<div class="col-md-2"><label>Tipo</label>';
        field += '<input class="form-control" type="text" name="campos_tipo[]"></div>';
        field += '<div class="col-md-5"><label>Validation</label>';
        field += '<input class="form-control" type="text" name="campos_validation[]"></div>';
        field += '<div class="col-md-1">';
        field += '<a href="#" style="margin-top:26px;" class="btn btn-block btn-danger btn-remove-field"><span class="glyphicon glyphicon-remove"></span></a>';
        field += '</div>';

        $('.fields-wrapper .panel-body').append($(field).hide().fadeIn('fast'));
        $('.fields-wrapper .panel-body').find('.row .col-nome input').focus();
    });

    $('body').on('click', '.btn-remove-field', function(e) {
        e.preventDefault();
        var _this = $(this).parent().parent();
        _this.fadeOut('fast', function() {
            _this.remove();
        });
    });
};
