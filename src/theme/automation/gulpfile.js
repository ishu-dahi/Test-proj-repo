// Modules & Plugins
var gulp = require('gulp');
var sass = require('gulp-sass');
sass.compiler = require('node-sass');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');

var arrayOfJsFiles = [
	'../../theme/js/vendor/jquery-3.6.0.min.js',
	'../../theme/js/vendor/bootstrap-3.4.1.min.js',
	'../../theme/js/vendor/lazysizes.min.js',
	'../../theme/js/vendor/splide.min.js',
	'../../theme/js/vendor/prefetcher.min.js',
	'../../theme/js/vendor/timeline.min.js',
	'../../theme/js/custom.js'
];

// Scripts Task
gulp.task('scripts', function(done) {
	gulp.src(arrayOfJsFiles)
		.pipe(concat('app.js'))
		.pipe(gulp.dest('../../theme/js'));

	gulp.src(arrayOfJsFiles)
		.pipe(concat('app.js'))
		.pipe(rename({suffix: '.min'}))
		.pipe(uglify())
		.pipe(gulp.dest('../../theme/js'));

	done();
});

// SCSS Task
gulp.task('scss', function() {
	return gulp.src('../../theme/scss/mixed.min.scss')
		.pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
		.pipe(gulp.dest('../../theme/css/'));
});

// Watch Task
gulp.task('watch', function() {
	gulp.watch('../../theme/scss/**/*.scss', gulp.series('scss'));
	gulp.watch(arrayOfJsFiles, gulp.series('scripts'));
});

// Default Task
gulp.task('default', gulp.parallel('scss', 'scripts', 'watch'));
