const vendor = {
    main: {
        js: [],

        css: [],
    },

    painel: {
        js: [
            'bootswatch-dist/js/bootstrap.min.js',
            'jquery-ui/jquery-ui.min.js',
            'bootbox.js/bootbox.js',
            'blueimp-file-upload/js/jquery.fileupload.js',
            'jscolor-picker/jscolor.js',
            'toastr/toastr.min.js',
            'bootstrap-multiselect/dist/js/bootstrap-multiselect.js',
            'datatables/media/js/jquery.dataTables.min.js',
            'datatables/media/js/dataTables.bootstrap.min.js',
            'clipboard/dist/clipboard.min.js',
        ],

        css: [
            'datatables/media/css/dataTables.bootstrap.min.css',
            'toastr/toastr.min.css',
            'bootstrap-multiselect/dist/css/bootstrap-multiselect.css',
        ],
    },
};

const jsPath = '../public/assets/js/';
const cssPath = '../public/assets/css/';

const fs = require('fs');

function concat(opts) {
    const fileList = opts.src;
    const distPath = opts.dist;
    const out = fileList.map(function(filePath) {
        return fs.readFileSync(`../public/assets/vendor/${filePath}`, 'utf-8');
    });

    fs.writeFileSync(distPath, out.join('\n'), 'utf-8');
    console.log(`${distPath} built.`);
}

if (!fs.existsSync(jsPath)) {
    fs.mkdirSync(jsPath);
}
if (!fs.existsSync(cssPath)) {
    fs.mkdirSync(cssPath);
}

concat({
    src: vendor.main.js,
    dist: `${jsPath}vendor.main.js`,
});

concat({
    src: vendor.painel.js,
    dist: `${jsPath}vendor.painel.js`,
});

concat({
    src: vendor.main.css,
    dist: `${cssPath}vendor.main.css`,
});

concat({
    src: vendor.painel.css,
    dist: `${cssPath}vendor.painel.css`,
});
