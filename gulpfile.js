var gulp = require('gulp');
var browserSync = require('browser-sync').create();

var $ = require('gulp-load-plugins')();

var path = {
	source : {
		scss : "./assets/src/scss/**/*.scss",
		php : "./**/*.php"
	},
	dist : {
		scss : "./assets/dist/css",
	}
}

gulp.task('sass-dev', function () {

	return gulp
		.src( path.source.scss )
		.pipe($.size({ showFiles: true }))
		.pipe($.plumber({ errorHandler: $.notify.onError("Error: <%= error.message %>") }))
		.pipe($.sourcemaps.init())
		.pipe($.sassLint())
		.pipe($.sassLint.format())
		.pipe($.sassLint.failOnError())
		.pipe($.sass())
		.pipe($.autoprefixer({ browsers: ['last 2 versions'], cascade: false }))
		.pipe($.size({ showFiles: true }))
		.pipe($.sourcemaps.write('css'))
		.pipe(gulp.dest( path.dist.scss ))
		.pipe(browserSync.stream({ match: '**/*.css' }))
	;

});

gulp.task('sass-build', function () {

	return gulp
		.src( path.source.scss )
		.pipe($.size({ showFiles: true }))
		.pipe($.plumber({ errorHandler: $.notify.onError("Error: <%= error.message %>") }))
		.pipe($.sass({ outputStyle: 'compressed' }))
		.pipe($.size({ showFiles: true }))
		.pipe($.autoprefixer({ browsers: ['last 2 versions'], cascade: false }))
		.pipe($.size({ showFiles: true }))
		.pipe($.cssnano())
		.pipe($.size({ showFiles: true }))
		.pipe(gulp.dest( path.dist.scss ))
		.pipe(browserSync.stream({ match: '**/*.css' }))
	;

});

// Static Server + watching scss/html files
gulp.task('serve', function() {

	browserSync.init({
		proxy: "http://faster.wp"
	});

	gulp.watch( path.source.scss, gulp.series("sass-dev"));
    gulp.watch( path.source.php ).on('change', browserSync.reload);

});

// Creating a default task
gulp.task("default", gulp.series("sass-dev", "serve"));
