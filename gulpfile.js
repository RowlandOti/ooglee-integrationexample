// Include laravel-elixir, gulp, bower
var elixir = require('laravel-elixir');
var gulp = require("gulp");
var bower = require("gulp-bower");

gulp.task('bower', function() {
    return bower();
});

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

var bowerDir = './resources/assets/vendor';

var paths = {
 	'resDIR': './resources/assets',
    'adminLTE': bowerDir + "/admin-lte",
    'fontAWESOME': bowerDir + "/font-awesome",
    'ioniCONS': bowerDir + "/ionicons",
    'appLESS': './resources/assets/less'
};
 
var lessPaths = [
    paths.appLESS + "/less",
    paths.fontAWESOME + "/less",
    paths.ioniCONS + "/less",
    paths.adminLTE + "/less"
];

elixir.config.sourcemaps = false;

elixir(function(mix) {

	// Run bower install
    mix.task('bower');
    // Compile LESS files
    mix.less(paths.appLESS + '/app.less');
    // Copy to public
    mix.copy(paths.adminLTE + '/dist/**', 'public/vendor/admin-lte/dist');
    mix.copy(paths.adminLTE + '/bootstrap/**', 'public/vendor/admin-lte/bootstrap');
    mix.copy(paths.adminLTE + '/plugins/**', 'public/vendor/admin-lte/plugins');
    mix.copy(paths.fontAWESOME + '/css/**', 'public/vendor/font-awesome/css');
    mix.copy(paths.fontAWESOME + '/fonts/**', 'public/vendor/font-awesome/fonts');
    mix.copy(paths.ioniCONS + '/css/**', 'public/vendor/ionicons/css');
    mix.copy(paths.ioniCONS + '/fonts/**', 'public/vendor/ionicons/fonts');
    mix.copy(paths.ioniCONS + '/png/**', 'public/vendor/ionicons/png');

});
