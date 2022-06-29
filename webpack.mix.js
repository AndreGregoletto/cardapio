const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

 mix.css('resources/css/plugins/fontawesome-free/css/all.css', 'public/css/fontawesome.css');
 mix.css('resources/css/plugins/icheck-bootstrap/icheck-bootstrap.css', 'public/css');
 mix.css('resources/css/app.css', 'public/css');
 
 mix.js([
     'resources/js/plugins/bootstrap/js/bootstrap.bundle.js',
     'resources/js/app.js'
 ], 'public/js/app.js');
 
 
 if(mix.inProduction()) {
     mix.version();
 }
 
 mix.webpackConfig({
     stats: {
         children: true,
     },
 });
