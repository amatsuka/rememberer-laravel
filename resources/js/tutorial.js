function clearStepClasses() {
    $("body").removeClass(function (index, className) {
        return (className.match(/^(tut-\d-step-active)/g) || []).join(' ');
    });
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
    showShadeifNeed();
    $('html, body').animate({
        scrollTop: $(".tut-" + stepNum + "-step").offset().top
    }, 1000);
    $('body').addClass("tut-" + stepNum + "-step-active");
    $('#tut-modal-' + stepNum).modal('show');
}
