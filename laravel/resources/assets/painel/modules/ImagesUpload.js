export default function ImagesUpload() {
    var $wrapper = $('#images-upload');
    var errors;

    $wrapper.fileupload({
        dataType: 'json',
        start: function(e) {
            if ($('.no-images').length) $('.no-images').fadeOut();

            if ($('.errors').length) {
                errors = [];
                $('.errors').fadeOut().html('');
            }
        },
        done: function (e, data) {
            $('#imagens').prepend($(data.result.body).hide().addClass('new'))
                         .sortable('refresh');
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);

            $('.progress-bar').css(
                'width',
                progress + '%'
            );
        },
        stop: function() {
            $('.progress-bar').css('width', 0);

            $('#imagens').find('.imagem').sort(function(a, b) {
                var imgA = $(a).data('imagem').toUpperCase();
                var imgB = $(b).data('imagem').toUpperCase();
                var ordA = $(a).data('ordem');
                var ordB = $(b).data('ordem');

                if (ordA < ordB) return -1;
                if (ordA > ordB) return 1;
                if (imgA < imgB) return -1;
                if (imgA > imgB) return 1;
                return 0;
            }).appendTo($('#imagens'));

            $('#imagens .imagem.new').each(function(i) {
                $(this).delay((i++) * 400).fadeIn(300);
            });

            $('.imagem').removeClass('new');

            if (errors.length) {
                errors.forEach(function(message) {
                    $('.errors').append(message + '<br>');
                });
                $('.errors').fadeIn();
            }
        },
        fail: function(e, data) {
            var status       = data.jqXHR.status,
                errorMessage = (status == '422' ? 'O arquivo deve ser uma imagem.' : 'Erro interno do servidor.'),
                response     = 'Ocorreu um erro ao enviar o arquivo ' + data.files[0].name + ': ' + errorMessage;

            errors.push(response);
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
};
