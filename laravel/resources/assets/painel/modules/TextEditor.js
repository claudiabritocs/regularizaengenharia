const config = {
    padrao: {
        toolbar: [['Bold', 'Italic']]
    },

    clean: {
        toolbar: [],
        removePlugins: 'toolbar,elementspath',
    },

    cleanBr: {
        toolbar: [],
        removePlugins: 'toolbar,elementspath',
        enterMode: CKEDITOR.ENTER_BR
    },
};

export default function TextEditor() {
    CKEDITOR.config.language = 'pt-br';
    CKEDITOR.config.uiColor = '#dce4ec';
    CKEDITOR.config.contentsCss = [
        $('base').attr('href') + '/assets/ckeditor.css',
        CKEDITOR.config.contentsCss
    ];
    CKEDITOR.config.removePlugins = 'elementspath';
    CKEDITOR.config.resize_enabled = false;
    CKEDITOR.plugins.addExternal('injectimage', $('base').attr('href') + '/assets/injectimage/plugin.js');
    CKEDITOR.config.allowedContent = true;
    CKEDITOR.config.extraPlugins = 'injectimage';

    $('.ckeditor').each(function (i, obj) {
        CKEDITOR.replace(obj.id, config[obj.dataset.editor]);
    });
};
