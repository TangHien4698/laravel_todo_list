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
    .js('resources/js/sweetalert/sweetalert2.all.js', 'public/js/sweetalert')
    .js('resources/js/sweetalert/sweetalert2.js', 'public/js/sweetalert')
    .js('resources/js/sweetalert/sweetalert2.min.js', 'public/js/sweetalert')
     .js('resources/js/task/index_task.js', 'public/js/task')
    .js('resources/js/user/index_user.js', 'public/js/user')
    .js('resources/js/category/index_category.js', 'public/js/category')
    .js('resources/js/main.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/index_task.scss', 'public/css')
    .sass('resources/sass/index_user.scss', 'public/css')
    .sass('resources/sass/util.scss', 'public/css')
     .sass('resources/sass/login.scss', 'public/css')
    .sass('resources/sass/sweetalert2.min.scss', 'public/css')
     .sass('resources/sass/index_cat.scss', 'public/css');
