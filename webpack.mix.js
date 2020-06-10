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

mix.styles([
    'resources/assets/css/adminlte.min.css',
    'resources/assets/css/dataTables.bootstrap4.css',
    'resources/assets/css/font-awesome.css',
    'resources/assets/css/font-awesome.min.css',
    'resources/assets/css/blue.css',
    'resources/assets/css/morris.css',
    'resources/assets/css/jquery-jvectormap-1.2.2.css',
    'resources/assets/css/datepicker3.css',
    'resources/assets/css/daterangepicker-bs3.css',
    'resources/assets/css/bootstrap3-wysihtml5.min.css',
    'resources/assets/css/bootstrap-rtl.min.css',
    'resources/assets/css/admin-custom-style.css',
    'resources/assets/css/select2.min.css',

    'resources/assets/css/font-awesome.css',
    'resources/assets/css/frontendlte.min.css'
],'public/css/admin.min.css');
