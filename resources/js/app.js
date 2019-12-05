window.Popper = require('popper.js');
window.$ = window.jQuery = require('jquery');
require('./bootstrap');
require('bootstrap');

import tutorial from "./tutorial";
$(() => {
    $('#tutorialModal').modal('show');

    $('.tut-set-step').on('click', function() {
        let step = $(this).attr('data-tut-step');
        tutorial(step);
    });
});
