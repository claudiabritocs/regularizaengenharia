export default function ClipboardWrapper() {
    var clipboard = new Clipboard('.clipboard');

    clipboard.on('success', function(e) {
        $(e.trigger).removeClass('btn-info').addClass('btn-success').delay(500).queue(function() {
            $(this).removeClass('btn-success').addClass('btn-info').dequeue();
        });
    });
};
