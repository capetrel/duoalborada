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
    .sass('resources/sass/slider.scss', 'public/css')
    .sass('resources/sass/datepicker.scss', 'public/css')
    .sass('resources/sass/wysiwyg.scss', 'public/css')
    .options({
        processCssUrls: false,
        postCss: [
            require('autoprefixer')({
                browsers: ['last 40 versions'],
                grid: true
            })
        ]
    })
    .js('resources/js/master.js', 'public/js')
    .js('resources/js/duoalborada.js', 'public/js')
    .js('resources/js/slider.js', 'public/js')
    .js('resources/js/datepicker.js', 'public/js')
    .js('resources/js/wysiwyg.js', 'public/js')
    .mix.browserSync('duoalborada.test');

