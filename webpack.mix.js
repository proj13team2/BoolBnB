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

mix.sass('resources/sass/app.scss', 'public/css').js('resources/js/app.js', 'public/js').js('resources/js/search.js', 'public/js/search.js').js('resources/js/chart.js', 'public/js/chart.js').js('resources/js/validation.js', 'public/js/validation.js').js('resources/js/map.js', 'public/js/map.js').js('resources/js/delete.js', 'public/js/delete.js');
