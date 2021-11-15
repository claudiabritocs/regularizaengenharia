CKEDITOR.dialog.add('injectimageDialog', function (editor) {
    return {
        title: 'Inserir Imagem',
        minWidth: 400,
        minHeight: 50,
        contents: [
            {
                id: 'tab-basic',
                label: 'Selecionar Arquivo',
                elements: [
                    {
                        type: 'file',
                        id: 'imagem',
                        label: 'Selecionar Arquivo',
                        validate: CKEDITOR.dialog.validate.notEmpty('Selecione um arquivo!')
                    }
                ]
            }
        ],
        onOk: function() {
            var img    = editor.document.createElement('img'),
                iframe = $('.cke_dialog_body iframe'),
                form   = $('form', iframe.contents());

            var oData = new FormData(form[0]),
                oReq  = new XMLHttpRequest(),
                url   = document.getElementsByTagName('base')[0].href + '/painel/ckeditor-upload';

            var metas = document.getElementsByTagName('meta'),
                token = null;

            for (i=0; i < metas.length; i++) {
                if (metas[i].getAttribute('name') == 'csrf-token') {
                    token = metas[i].getAttribute('content');
                }
            }

            oReq.open('POST', url, true);
            oReq.setRequestHeader('X-CSRF-TOKEN', token);
            oReq.onload = function(oEvent) {
                if (oReq.status >= 200 && oReq.status < 400) {
                    retorno = JSON.parse(oReq.response);
                    if (!retorno.error) {
                        img.setAttribute('src', retorno.filepath);
                        editor.insertElement(img);
                    } else {
                        alert(retorno.message);
                    }
                } else {
                    console.log('Erro ' + oReq.status);
                }
            };
            oReq.send(oData);
        },
    };
});
