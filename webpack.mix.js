let mix = require('laravel-mix');
let build = require('./tasks/build.js');

mix.disableSuccessNotifications();
mix.setPublicPath('source/assets/build/');
mix.webpackConfig({
    plugins: [
        build.jigsaw,
        build.browserSync(),
        build.watch([
            'config.php',
            'source/**/*.md',
            'source/**/*.php',
            'source/**/*.scss',
        ]),
    ],
});

mix.js('source/_assets/js/main.js', 'js')
    .js('source/_assets/js/search.js', 'js')
    .sourceMaps()
    .postCss('source/_assets/css/main.css', 'css/main.css', [require('tailwindcss')])
    .sourceMaps()
    .version();
