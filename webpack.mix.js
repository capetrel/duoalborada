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

mix.sass('resources/sass/duoalborada.scss', 'public/css')
    .sass('resources/sass/master.scss', 'public/css')
    .options({
        processCssUrls: false
    })
    .js('resources/js/master.js', 'public/js')
    .js('resources/js/duoalborada.js', 'public/js')
    .mix.browserSync('duoalborada.test');

