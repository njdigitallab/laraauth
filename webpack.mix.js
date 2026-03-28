let mix = require('laravel-mix');
require('laravel-mix-copy-watched');

mix
  .postCss("resources/css/app.css", "public/css", [
    require("@tailwindcss/postcss"),
  ]).copy('public', '../../Projects/dummy/public/vendor/nj-digital-lab/laraauth')
  .browserSync({
    proxy: 'http://dummy.test',
    browser: "firefox"
  });