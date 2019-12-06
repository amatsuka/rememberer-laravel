function clearStepClasses() {
    $("body").removeClass(function (index, className) {
        return (className.match(/(tut\-\d\-step\-active)/g, "") || []).join(' ');
    });

    $("body").removeClass('tut-active');
}

function closeStepModals() {
    $('.tut-modal').modal('hide');
}

function showShadeifNeed() {
    $('#shade:hidden').show();
}

export default function (stepNum) {
    clearStepClasses();
    closeStepModals();

    if (stepNum == undefined) {
        return;
    }

    if (stepNum == '4') {
        quill.setContents({ "ops": [{ "insert": "Моя первая заметка в getremember\n" }] }, 'api');
    }

    if (stepNum == 'saveNote') {
        $('#save-note-form #is-tutorial').val(1);
        $('#save-note-form #is-tutorial').val(1);
        $('#save-note-form [name=password]').val("");
        $('#save-note-form').submit();
    }

    showShadeifNeed();
    $('html, body').animate({
        scrollTop: $(".tut-" + stepNum + "-step").offset().top
    }, 1000);
    $('body').addClass("tut-" + stepNum + "-step-active");
    $('body').addClass("tut-active");
    $('#tut-modal-' + stepNum).modal('show');
}
