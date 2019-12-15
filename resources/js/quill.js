$(() => {
    var toolbarOptions = [
        [ 'code-block'],
    ];

    window.quill = new Quill('#editor-container', {
        modules: {
            syntax: true,
            toolbar: toolbarOptions
        },
        theme: 'snow'
    });
    $('#save-note-form').on('submit', () => {
        $('#text').val(JSON.stringify(quill.getContents()));
    });

    if (!window._ .isEmpty($('#editor-container').text())) {
        quill.setContents(JSON.parse($('#editor-container').text()), 'api');
    }

})
