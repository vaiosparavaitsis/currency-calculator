let gulp = require('gulp');
let sass = require('gulp-sass');

gulp.task('buildcss', function() {
    return gulp.src('public/assets/css/layouts/build/*.scss')
        .pipe(sass())
        .pipe(gulp.dest('public/assets/css/layouts/src'))
});

gulp.task('watchers', function() {
    gulp.watch('public/assets/css/scss/app.scss', gulp.series('buildcss'));
    gulp.watch('public/assets/css/scss/helpers/*.scss', gulp.series('buildcss'));
    gulp.watch('public/assets/css/themes/default/*.scss', gulp.series('buildcss'));
    gulp.watch('public/assets/css/layouts/build/*.scss', gulp.series('buildcss'));
});

gulp.task('watch', gulp.series('buildcss', 'watchers'));

// gulp.task('buildjs', function() {
//     return gulp.src('web/assets/js/build/*.js')
//         .pipe(gulp.dest('web/assets/js/src'))
// });
//
// gulp.task('build', gulp.series('buildcss', 'buildjs'));
gulp.task('build', gulp.series('buildcss'));
