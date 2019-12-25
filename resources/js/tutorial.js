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

 function turorial(stepNum) {
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

$(() => {
    $('#tutorialModal').modal('show');

    let secontTutorialStep = $('.secontStepTutorialModal').eq(0).attr('data-tut-step');

    if (secontTutorialStep) {
        tutorial(secontTutorialStep);
    }

    $('.tut-set-step').on('click', function () {
        let step = $(this).attr('data-tut-step');
        tutorial(step);
    });
});

