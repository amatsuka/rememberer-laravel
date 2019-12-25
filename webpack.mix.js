const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('node_modules/monaco-editor/esm/vs/editor/editor.worker.js', 'public/js/monaco')
    .js('node_modules/monaco-editor/esm/vs/language/json/json.worker.js', 'public/js/monaco')
    .js('node_modules/monaco-editor/esm/vs/language/css/css.worker.js', 'public/js/monaco')
    .js('node_modules/monaco-editor/esm/vs/language/html/html.worker.js', 'public/js/monaco')
    .js('node_modules/monaco-editor/esm/vs/language/typescript/ts.worker.js', 'public/js/monaco')
    .sass('resources/sass/app.scss', 'public/css');
