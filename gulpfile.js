var gulp = require('gulp'),
	jshint = require('gulp-jshint'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
	minifyCss = require('gulp-minify-css');

gulp.task('js', function () {
   return gulp.src('src/js/*.js')
      .pipe(jshint())
      .pipe(jshint.reporter('default'))
      .pipe(uglify())
      .pipe(concat('theme.js'))
      .pipe(gulp.dest('build'));
});

gulp.task('css', function() {
  return gulp.src('src/styles/*.css')
    .pipe(minifyCss())
    .pipe(gulp.dest('build'));
});

gulp.task('build', function(){
	return gulp.src('src/*.php')
	.pipe(gulp.dest('build'));
});
