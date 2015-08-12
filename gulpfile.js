var gulp = require('gulp');
var sass = require('gulp-sass');
var minify = require('gulp-minify-css');
var rename = require('gulp-rename');

gulp.task('sass', function () {
    return gulp.src('css/sass/*.scss')
        .pipe(sass.sync().on('error', sass.logError))
        .pipe(gulp.dest('css/'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(minify())
        .pipe(gulp.dest('css/'));
});

gulp.task('watch', ['sass'], function () {
    gulp.watch('css/sass/**/*', ['sass']);
});
