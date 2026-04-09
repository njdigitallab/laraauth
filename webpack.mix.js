let mix = require('laravel-mix');
require('laravel-mix-copy-watched');

mix
  .postCss("resources/css/app.css", "public/css", [
    require("@tailwindcss/postcss"),
  ]);