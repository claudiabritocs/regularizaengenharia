export default function MonthPicker() {
    $('.monthpicker').datepicker({
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        closeText: 'Selecionar',
        onClose: function(date, input) {
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate', new Date(year, month, 1));
            
            setTimeout(() => {
                $(input).datepicker('widget').removeClass('hide-calendar hide-today');
            }, 150);
        },
        beforeShow: function(input) {
            var selDate = $(this).val();
            if (selDate.length > 0) {
                var year = selDate.substring(selDate.length - 4);
                var month = selDate.substring(0, 2);
                $(this).datepicker('option', 'defaultDate', new Date(year, month, 0))
                $(this).datepicker('setDate', new Date(year, month, 0));
            }
            $(input).datepicker('widget').addClass('hide-calendar hide-today');
        },
        monthNames: ['Janeiro','Fevereiro','Mar&ccedil;o','Abril','Maio','Junho',
        'Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun',
        'Jul','Ago','Set','Out','Nov','Dez'],
        dateFormat: 'mm/yy',
    });

    $('html > head').append('<style>.ui-datepicker select.ui-datepicker-month,.ui-datepicker select.ui-datepicker-year { color: #2C3E50; font-weight: normal; } .hide-calendar .ui-datepicker-calendar, .hide-today .ui-datepicker-current { display: none; }</style>');
    
    if ($('.monthpicker').val() == '') $('.monthpicker').datepicker("setDate", new Date());
};
