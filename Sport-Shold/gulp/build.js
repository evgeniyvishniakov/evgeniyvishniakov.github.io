var gulp            = require('gulp');
var runSequence     = require('run-sequence');

gulp.task('build', function() {
    runSequence(
            'sass',
            'html',
            'js',
            'fonts',
            'img:watch',
            'libs'
        );
  });