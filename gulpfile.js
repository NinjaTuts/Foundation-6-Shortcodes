// Project configuration
var project 		= 'foundation-6-shortcodes', // Project name, used for build zip.
	url 					= 'http://localhost/wp', // Local Development URL for BrowserSync. Change as-needed.
	bower 				= './bower_components/'; // Not truly using this yet, more or less playing right now. TO-DO Place in Dev branch
	build 				= './buildplugin/', // Files that you want to package into a zip go here
	buildInclude 	= [
		// include common file types
		'**/*.php',
		'**/*.html',
		'**/*.css',
		'**/*.js',
		'**/*.svg',
		'**/*.ttf',
		'**/*.otf',
		'**/*.eot',
		'**/*.woff',
		'**/*.woff2',

		// exclude files and folders
		'!node_modules/**/*',
		'!**/*.map',
		'!./buildplugin/**/*'
	];

// Load Plugins
var gulp = require('gulp');
var loadPlugins = require('gulp-load-plugins');
var argv = require('yargs').argv;
var port = (argv.port === undefined) ? 3000 : argv.port;
var p = loadPlugins({
	pattern: '*',
	// DEBUG: true,
	rename: {
		'gulp-jshint': 'jsLinter',
		'gulp-combine-media-queries': 'cmq'
	}
});

/**
 *
 * Copy CSS, SCSS and JS dependencies from bower_components to respective folders
 *
*/
gulp.task('copyBower', function() {
	return gulp.src(['bower_components/foundation-sites/dist/*.min.css'])
	  .pipe(gulp.dest('./public/css')),

	  gulp.src(['bower_components/motion-ui/dist/*.min.css'])
	  .pipe(gulp.dest('./public/css')),

		gulp.src(['bower_components/foundation-sites/dist/*.min.js', 'bower_components/motion-ui/dist/*.min.js'])
	  .pipe(gulp.dest('./public/js'))
		.pipe(p.notify({ message: 'Copied CSS & JS files from Bower', onLast: true }));
});

/**
 *
 * Looking at src/sass and compiling the files into Expanded format, Autoprefixing and sending the files to the build folder
 *
*/
gulp.task('scss', function () {
	return gulp.src(['./admin/scss/**/*.scss', './public/scss/**/*.scss'])
		.pipe(p.plumber())
		.pipe(p.sourcemaps.init())
		.pipe(p.sass({
			errLogToConsole: true,
			outputStyle: 'expanded'
		})).on('error', p.sass.logError)

		.pipe(p.sourcemaps.write({includeContent: false}))
		.pipe(p.sourcemaps.init({loadMaps: true}))
		.pipe(p.autoprefixer('last 5 version', '> 1%', 'safari 5', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
		// .pipe(p.cmq()) // Combines Media Queries
		.pipe(p.cssnano({
			autoprefixer: false
		}))
		.pipe(p.sourcemaps.write('.'))
		.pipe(p.plumber.stop())
		.pipe(gulp.dest('./'))
		// .pipe(p.filter('**/*.css')) // Filtering stream to only css files
		// .pipe(p.rename({suffix: '.min'}))
		// .pipe(gulp.dest('./'))
		.pipe(p.browserSync.reload({stream:true})) // Inject Styles when min style file is created
		// .pipe(p.notify({ message: 'Styles task complete', onLast: true }));
});

/**
 * Scripts: Vendors
 *
 * Look at src/js and concatenate those files, send them to assets/js where we then minimize the concatenated file.
*/
gulp.task('vendorsJs', function() {
	return gulp.src('./assets/js/vendors/*.js')
		.pipe(p.concat('vendors.js'))
		.pipe(gulp.dest('./assets/js'))
		.pipe(p.uglify())
		.pipe(p.rename( {
			suffix: '.min'
		}))
		.pipe(gulp.dest('./assets/js/'))
		.pipe(p.notify({ message: 'Vendor scripts task complete', onLast: true }));
});

/**
 * Scripts: Custom
 *
 * Look at src/js and concatenate those files, send them to assets/js where we then minimize the concatenated file.
*/
function jsLint(file) {
	return gulp.src(file)
		.pipe(p.plumber({
      handleError: function (err) {
        console.log(err);
        this.emit('end');
      }
    }))
		.pipe(p.jsLinter())
  	.pipe(p.jsLinter.reporter(p.jshintStylish))
  	.on('error', p.util.log)
		.pipe(gulp.dest('./assets/js/'))
		.pipe(p.uglify())
		.pipe(p.rename( {
			suffix: '.min'
		}))
		.pipe(gulp.dest('./assets/js/'))
		.pipe(p.browserSync.reload(
			{stream: true}
		));
}

/**
 * Scripts: PHP
 *
 * Lint PHP files using phplint - phplint must be installed on the system
*/
gulp.task('php-lint', function (cb) {
  p.phplint.lint(['./**/*.php', '!./node_modules/**/*'],  { limit: 10 }, function (err, stdout, stderr) {
    if (err) {
      cb(err);
    } else {
      cb();
    }
  });
});

function phpLint(file) {
	p.phplint.lint(file,  { limit: 10 }, function (err, stdout, stderr) {
    if (err) {
    	console.log('err', err);
    }
  });

	// return gulp.src([file])
 //    .pipe(p.phplint.lint())
 //    // .pipe(p.phplint.reporter('fail'));
 //    .pipe(p.browserSync.reload(
	// 		{stream: true}
	// 	));
}

/**
 *
 * Delete files and folders
 * 
*/
gulp.task('clean', function() {
	return p.del(['./public/css/*.css',
		'!./public/css/foundation-6-shortcodes-public.css',
		'./public/js/*.js',
		'!./public/js/foundation-6-shortcodes-public.js',
		'**/.sass-cache',
		'**/.DS_Store'
	]);
});

/**
 * Browser Sync
 *
 * Asynchronous browser syncing of assets across multiple devices!! Watches for changes to js, image and php files
 * 
*/
gulp.task('browser-sync', function() {
	var files = [
			'**/*.scss',
			'**/*.php',
			'**/*.{png,jpg,gif}'
    ];
	p.browserSync.init(files, {
    proxy: url,
		port: port,
		injectChanges: true
	});
});

/**
 *
 * Watch CSS, JS, PHP file changes and reload browser
 * 
*/
gulp.task('watch', ['browser-sync'], function() {
  gulp.watch(['./admin/scss/**/*.scss', './public/scss/**/*.scss'], ['scss']);

  gulp.watch(['./admin/js/foundation-6-shortcodes-admin.js', './public/js/foundation-6-shortcodes-public.js']).on('change', function(e) {
  	jsLint(e.path);
  });

  gulp.watch('**/*.php').on('change', function(e) {
  	phpLint(e.path);
  });
});

/**
* Zipping build directory for distribution
*
* Taking the build folder, which has been cleaned, containing optimized files and zipping it up to send out as an installable theme
*/
// gulp.task('build-zip', function () {
// 	// return 	gulp.src([build+'/**/', './.jshintrc','./.bowerrc','./.gitignore' ])
// 	return 	gulp.src(build+'/**/')
// 		.pipe(zip(project+'.zip'))
// 		.pipe(gulp.dest('./'))
// 		.pipe(notify({ message: 'Zip task complete', onLast: true }));
// });


/**
 *
 * Build task to make a zipped theme file
 * 
*/
gulp.task('build', function() {
	p.runSequence('clean', 'copyBower', 'vendorsJs', 'scss');
});

// Default task
gulp.task('default', ['watch']);