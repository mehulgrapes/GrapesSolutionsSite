const gulp = require("gulp");

// Requires the gulp-sass plugin
const autoprefixer = require("gulp-autoprefixer"),
  sass = require("gulp-sass"),
  //  gutil = require('gulp-util'),
  bs = require("browser-sync").create(),
  uglify = require("gulp-uglify"),
  concat = require("gulp-concat"),
  sourcemaps = require("gulp-sourcemaps"),
  image = require("gulp-image");

gulp.task("bs", function() {
  bs.init({
    server: {
      baseDir: "./build/"
    }
  });
  gulp.watch("dev/scss/**/*.scss", gulp.series("sass"));
  gulp.watch("./**/*.html").on("change", bs.reload);
  gulp.watch("./**/*.js").on("change", bs.reload);
});

gulp.task("icons", function() {
  return gulp
    .src("node_modules/@frntawesome/fontawesome-free/webfonts/*")
    .pipe(gulp.dest("build/fonts"));
});

gulp.task("sass", function() {
  return gulp
    .src("dev/scss/**/*.scss")
    .pipe(sourcemaps.init())
    .pipe(sass({ outputStyle: "compact" })) //.on('error', gutil.log.bind(gutil, 'Sass Error')) // 'compressed' for one line css
    .pipe(
      autoprefixer({
        browsers: ["last 4 versions"],
        cascade: false
      })
    )
    .pipe(sourcemaps.write("./"))
    .pipe(gulp.dest("build/css"))
    .pipe(bs.stream());
});

gulp.task("scripts", function() {
  return gulp
    .src([
      "node_modules/jquery/dist/jquery.min.js",
      "node_modules/bootstrap/dist/js/bootstrap.bundle.js",
      "node_modules/imagesloaded/imagesloaded.pkgd.min.js",
      "node_modules/swiper/dist/js/swiper.js",
      "node_modules/wow.js/dist/WOW.js",
      "node_modules/isotope-layout/dist/isotope.pkgd.min.js",
      "node_modules/imagesloaded/imagesloaded.pkgd.js",
      "node_modules/justifiedGallery/dist/js/jquery.justifiedGallery.min.js"
    ])
    .pipe(concat("plugins.js"))
    .pipe(uglify())
    .pipe(gulp.dest("build/js/"));
});

gulp.task("image", function() {
  return gulp
    .src("dev/images/*")
    .pipe(image())
    .pipe(gulp.dest("build/images/"));
});

gulp.task("default", gulp.series("scripts", "sass", "icons", "image", "bs"));
