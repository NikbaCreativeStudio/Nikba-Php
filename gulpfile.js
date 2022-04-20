"use strict";
//Gulp
const {src, dest} = require("gulp"); //reading and writing sources
const gulp = require("gulp"); // Connect GULP

//Css
const autoprefixer = require("gulp-autoprefixer"); //AutoPrefix
const cssbeautify = require("gulp-cssbeautify"); //Beauty Css
const removeComments = require('gulp-strip-css-comments'); //Remove Comments in *.min.css
const rename = require("gulp-rename"); // Add *.min to files
const sass = require('gulp-sass')(require('sass')); // Compiler  SASS
const cssnano = require("gulp-cssnano"); //Compress CSS and remove whitespace, and last (;), makes all CSS on one line 

//Js
const gcmq = require("gulp-group-css-media-queries"); //Unites media queries 
const rigger = require("gulp-rigger"); //Merges different JS files into one
const babel = require('gulp-babel'); // ES6 => ES5
const uglify = require('gulp-uglify'); // Js minification
const plumber = require("gulp-plumber"); //In case of an error in JS, Tasks in Gulp do not fly

//Images
const imagemin = require("gulp-imagemin"); //Image compression and optimization
const webp = require('gulp-webp');

//Tools
const del = require("del"); // Remove directory Dist
const browsersync = require("browser-sync").create(); // Local server with live reload


// Paths
let path = {
    proxy: "https://demo.site.com/",
    build: {
        js: "./public/assets/js/",
        css: "./public/assets/css/",
        images: "./public/assets/images/",
        svg: "./public/assets/images/svg/",
        fonts: "./public/assets/fonts/",
    },
    src: {
        js: "./resources/assets/js/*.js",
        css: "./resources/assets/scss/style.scss",
        images: "./resources/assets/images/**/*.{jpg,jpeg,png,gif,ico,webp}",
        svg: "./resources/assets/images/svg/*.svg",
        fonts: "./resources/assets/fonts/**/*.*",
        twig: "./resources/views/**/*.twig",
    },
    watch: {
        js: "./resources/assets/js/**/*.js",
        css: "./resources/assets/scss/**/*.scss",
        images: "./resources/assets/images/**/*.{jpg,jpeg,png,gif,ico,webp}",
        svg: "./resources/assets/images/svg/*.svg",
        fonts: "./resources/assets/fonts/**/*.*",
        twig: "./resources/views/**/*.twig",
    },
    clean: "./public/assets/"
};

//Tasks 
function browserSync() {
    browsersync.init({
        proxy: path.proxy,
    });
}

function browserSyncReload() {
    browsersync.reload();
}

function twig() {
    return browserSyncReload();
}


function css() {
    return src(path.src.css, {
        base: "./resources/assets/scss/"
    })
        .pipe(plumber())
        .pipe(sass())
        .pipe(autoprefixer({
            overrideBrowserslist: ['last 8 versions'],
            cascade: true
        }))
        .pipe(cssbeautify())
        .pipe(gcmq())
        .pipe(dest(path.build.css))
        .pipe(cssnano({
            zindex: false,
            discardComments: {
                removeAll: true
            }
        }))
        .pipe(removeComments())
        .pipe(rename({
            suffix: ".min",
            extname: ".css"
        }))
        .pipe(dest(path.build.css))
        .pipe(browsersync.stream());
}

function js() {
    return src(path.src.js, {
        base: './resources/assets/js/'
    })
        .pipe(plumber())
        .pipe(rigger())
        .pipe(gulp.dest(path.build.js))
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(uglify())
        .pipe(rename({
            suffix: ".min",
            extname: ".js"
        }))
        .pipe(dest(path.build.js))
        .pipe(browsersync.stream());
}

function images() {
    return src(path.src.images)
        .pipe(imagemin())
        .pipe(webp())
        .pipe(dest(path.build.images));
}

function svg() {

    return src(path.src.svg)
        .pipe(svgmin())
        .pipe(dest(path.build.svg));
}

function fonts () {
    return src(path.src.fonts)
        .pipe(dest(path.build.fonts));
}

function clean() {
    return del(path.clean);
}

function watchFiles() {
    gulp.watch([path.watch.css], css);
    gulp.watch([path.watch.js], js);
    gulp.watch([path.watch.images], images);
    gulp.watch([path.watch.svg], svg);
    gulp.watch([path.watch.fonts], fonts);
    gulp.watch([path.watch.twig], twig);
}

const build = gulp.series(gulp.parallel(images, svg, css, js, fonts));
const watch = gulp.parallel(build, watchFiles, browserSync);

/* Exports Tasks */
exports.css = css;
exports.js = js;
exports.images = images;
exports.svg = svg;
exports.fonts = fonts;
exports.clean = clean;
exports.build = build;
exports.watch = watch;
exports.default = watch;
exports.browserSync = browserSync;
exports.browserSyncReload = browserSyncReload;
