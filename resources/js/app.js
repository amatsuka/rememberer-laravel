window.Popper = require('popper.js');
window.$ = window.jQuery = require('jquery');
require('./bootstrap');
require('bootstrap');
require('./tutorial');

import * as monaco from 'monaco-editor';

self.MonacoEnvironment = {
    getWorkerUrl: function (moduleId, label) {
        if (label === 'json') {
            return './js/monaco/json.worker.js';
        }
        if (label === 'css') {
            return './js/monaco/css.worker.js';
        }
        if (label === 'html') {
            return './js/monaco/html.worker.js';
        }
        if (label === 'typescript' || label === 'javascript') {
            return './js/monaco/ts.worker.js';
        }
        return './js/monaco/editor.worker.js';
    }
}

let editor = monaco.editor.create(document.getElementById('editor-container'), {
    value: [
        'function x() {',
        '\tconsole.log("Hello world!");',
        '}'
    ].join('\n'),
    language: 'typescript'
});
