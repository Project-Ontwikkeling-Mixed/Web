var elixir = require('laravel-elixir');
var BrowserSync = require('laravel-elixir-browsersync2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('**/*.scss');
});

elixir(function(mix) {
    BrowserSync.init();
    mix.BrowserSync(
    {
        proxy           : "projectontwikkeling.mixed",
        logPrefix       : "Laravel Elixir BrowserSync",
        logConnections  : false,
        reloadOnRestart : false,
        notify          : false
    });
});
