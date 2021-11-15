CKEDITOR.plugins.add('injectimage', {
    icons: 'injectimage',

    init: function(editor) {
    	editor.addCommand('injectimageDialog', new CKEDITOR.dialogCommand('injectimageDialog'));

    	editor.ui.addButton('InjectImage', {
            label: 'Inserir Imagem',
            command: 'injectimageDialog'
		});

		CKEDITOR.dialog.add('injectimageDialog', this.path + 'dialogs/injectimage.js');
    }
});
