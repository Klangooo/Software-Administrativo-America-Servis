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
    .sass('resources/sass/app.scss', 'public/css')
    .js('resources/js/sb-admin-2.js', 'public/js/sb-admin-2.js')
    .styles('resources/css/sb-admin-2.css', 'public/css/sb-admin-2.css')
    .js('resources/js/jquery.easing.min.js', 'public/js/jquery.easing.min.js')
    .styles('resources/css/fontawesome.min.css', 'public/css/fontawesome.min.css');
