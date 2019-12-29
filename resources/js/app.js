window.Popper = require('popper.js');
window.$ = window.jQuery = require('jquery');
require('./bootstrap');
require('bootstrap');
import tutorial from './tutorial';

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

import * as monaco from 'monaco-editor';

self.MonacoEnvironment = {
    getWorkerUrl: function (moduleId, label) {
        if (label === 'json') {
            return '/js/monaco/json.worker.js';
        }
        if (label === 'css') {
            return '/js/monaco/css.worker.js';
        }
        if (label === 'html') {
            return '/js/monaco/html.worker.js';
        }
        if (label === 'typescript' || label === 'javascript') {
            return '/js/monaco/ts.worker.js';
        }
        return '/js/monaco/editor.worker.js';
    }
}

if (document.getElementById('editor-container')) {

    let text = document.getElementById('editor-container').textContent;
    document.getElementById('editor-container').textContent = '';
    window.editor = monaco.editor.create(document.getElementById('editor-container'));
    let model;

    if (text.length > 0) {

        let modelData = JSON.parse(text);

        model = monaco.editor.createModel(modelData['text'], modelData['lang']);

        editor.setModel(model);
    } else {
        model = monaco.editor.createModel('', 'plaintext');
        editor.setModel(model);
    }

    let modesIds = monaco.languages.getLanguages().map(function (lang) { return lang.id; });
    modesIds.sort();

    for (var i = 0; i < modesIds.length; i++) {
        var o = document.createElement('option');
        o.textContent = modesIds[i];
        o.value = modesIds[i];

        if (modesIds[i] == model.getModeId()) {
            o.selected = true;
        }

        $("#editor-lang").append(o);
    }

    $("#editor-lang").on('change', function () {
        let newModel = monaco.editor.createModel(editor.getValue(), $(this).val());
        editor.setModel(newModel);
    });

    $('#save-note-form').on('submit', () => {
        $('#text').val(editor.getValue());
    });
}

if (document.getElementById('diff-editor-container')) {
    let firstText = document.getElementById('first-note').textContent;
    let secondText = document.getElementById('second-note').textContent;
    document.getElementById('first-note').textContent = '';
    document.getElementById('second-note').textContent = '';

    let firstModelData = JSON.parse(firstText);
    let secondModelData = JSON.parse(secondText);

    let diffEditor = monaco.editor.createDiffEditor(document.getElementById('diff-editor-container'), {
        enableSplitViewResizing: false
    });

    var lhsModel = monaco.editor.createModel(firstModelData['text'], firstModelData['lang']);
    var rhsModel = monaco.editor.createModel(secondModelData['text'], secondModelData['lang']);

    diffEditor.setModel({
        original: rhsModel,
        modified: lhsModel
    });
}
