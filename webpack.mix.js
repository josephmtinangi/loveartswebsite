const { mix } = require('laravel-mix');

mix.js('resources/assets/js/admin.js', 'public/js')
    .sass('resources/assets/sass/admin.scss', 'public/css')
    .copy('resources/assets/img', 'public/img');
