var gulp = require('gulp');
var browserSync = require('browser-sync').create();

var $ = require('gulp-load-plugins')();

var path = {
	SCSS_SRC	: './sass/**/*.scss',
	SCSS_DST	: './css',
}

gulp.task('sass', function () {

	gulp.src( path.SCSS_SRC )
		.pipe($.plumber({errorHandler: $.notify.onError("Error: <%= error.message %>")}))
		.pipe($.sourcemaps.init())
		.pipe($.sass())
		.pipe($.autoprefixer({ browsers: ['last 2 versions'], cascade: false }))
		.pipe($.cssnano())
		.pipe($.sourcemaps.write('css'))
		.pipe($.size({ showFiles: true }))
		.pipe(gulp.dest( path.SCSS_DST ))
		.pipe(browserSync.stream({ match: '**/*.css' }))
	;

});

// Static Server + watching scss/html files
gulp.task('serve', ['sass'], function() {

	browserSync.init({
		proxy: "http://lazytype"
	});

	gulp.watch( path.SCSS_SRC, ['sass']);
    gulp.watch("./**/*.php").on('change', browserSync.reload);

});

// Creating a default task
gulp.task('default', ['sass', 'serve']);

