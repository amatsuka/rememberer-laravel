require('./bootstrap');
window.Popper = require('popper.js');
window.$ = window.jQuery = require('jquery');
require('bootstrap');

import Quill from 'quill';



$(() => {
    var quill = new Quill('#editor-container', {
        modules: {
            toolbar: [
                ['code-block']
            ]
        },
        placeholder: 'Compose an epic...',
        theme: 'snow'  // or 'bubble'
    });

   $('#form').on('submit', () => {
       $('#text').val(JSON.stringify(quill.getContents()));
   });

});
