var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var browserSync = require('browser-sync');
var reload = browserSync.reload;
var plumber = require('gulp-plumber');
var notify = require('gulp-notify');

var plumberErrorHandler = { errorHandler: notify.onError({
    title: 'Gulp',
    message: 'Error: <%= error.message %>'
  })
};

gulp.task('default', function(){
    console.log('default gulp task...')
});

// browser-sync task for starting the server.
gulp.task('browser-sync', function() {
    //watch files
    var files = [
    './assets/css/style.css',
    './**/*.php',
    './assets/js/*.js'
    ];

    //initialize browsersync
    browserSync.init(files, {
    //browsersync with a php server
      proxy: "localhost/maqfort",
      //notify: true
    });
});

gulp.task('sass', function () {

  return gulp.src('assets/sass/*.sass')

    .pipe(plumber(plumberErrorHandler))

    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))

    .pipe(autoprefixer({
            browsers: ['last 4 versions'],
            cascade: true
        }))

    .pipe(gulp.dest('assets/css'))

    .pipe(reload({stream:true}));

});


gulp.task('default', ['sass', 'browser-sync'], function() {
  gulp.watch('assets/sass/**/*.sass', ['sass']);
});
