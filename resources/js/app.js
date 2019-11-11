require('./bootstrap');
window.Popper = require('popper.js');
window.$ = window.jQuery = require('jquery');
require('bootstrap');

let ace = require('ace-builds');

let editor = ace.edit("editor");
editor.setTheme("ace/theme/twilight");
editor.session.setMode("ace/mode/javascript");
