window.Popper = require('popper.js');
window.$ = window.jQuery = require('jquery');
require('./bootstrap');
require('bootstrap');

import tutorial from "./tutorial";
$(() => {
    $('#tutorialModal').modal('show');

    let secontTutorialStep = $('.secontStepTutorialModal').eq(0).attr('data-tut-step');

    if (secontTutorialStep) {
        tutorial(secontTutorialStep);
    }

    $('.tut-set-step').on('click', function() {
        let step = $(this).attr('data-tut-step');
        tutorial(step);
    });
});
