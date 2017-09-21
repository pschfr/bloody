var gulp = require('gulp'),
	util = require('gulp-util'),
	ftp  = require('vinyl-ftp'),
	sass = require('gulp-sass');

gulp.task('sass', function() {
	return gulp.src('includes/css/style.sass').pipe(sass({
		outputStyle: 'compressed'
	}).on('error', sass.logError)).pipe(gulp.dest('includes/css'));
});

gulp.task('default', function() {
	var conn = ftp.create({
		host: 'hostname',
		user: 'username',
		pass: 'password',
		parallel: 8,
		log: util.log
	}),
	globs = [
		'**',
		'!./node_modules/**/*',
		'!.gitignore',
		'!package.json',
		'!gulpfile.js',
		'!README.md',
		'!LICENSE'
	];

	return gulp.src(globs, { buffer: false })
		  .pipe(conn.newer('/public_html/erickmorellfx.com/wp-content/themes/bloody'))
		  .pipe(conn.dest( '/public_html/erickmorellfx.com/wp-content/themes/bloody'));
});