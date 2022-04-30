# Nikba-Php
A small, simple PHP MVC framework skeleton that encapsulates a lot of features surrounded with powerful API from <a href="https://directus.io/">Directus</a>.

Nikba PHP is a very simple application, useful for small projects, helps to understand the PHP MVC skeleton, know how to make API calls and more.

It's not a full framework, nor a very basic one but it's not complicated. You can easily install, understand, and use it in any of your projects.

## Usage
  ```sh
  composer create-project nikba/nikba-php YOUR-PROJECT-NAME'
  ```
### Project configuratio .env
  ```sh
  PROJECT_URL = https://cms.demo.com/ // Project API EndPoint
  PROJECT_ID = demo // Project User ID
  PROJECT_TOKEN = demo // Project User Token
  ```
### Project Dev / Production app/config.php
  ```sh
  define("DEBUG", true); // true - Dev, false - Production
  ```
### Project Resources
* resources/assets/fonts
* resources/assets/images
* resources/assets/js
* resources/assets/scss
* resources/views

### Gulp Automatization
  ```sh
  gulp watch
  ```
### Gulp Functions
All Files are generated in public/assets/
* JS - babel, uglify - *.*.min.js
* CSS - sass, autoprefixer, cssbeautify, gcmq, cssnano, removeComments - *.min.css, *.css
* Images - imagemin, webp - *.webp
* SVG - svgmin - *svg
* Fonts - *.*