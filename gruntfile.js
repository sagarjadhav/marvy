'use strict';
module.exports = function ( grunt ) {

	// load all grunt tasks matching the `grunt-*` pattern
	// Ref. https://npmjs.org/package/load-grunt-tasks
	require( 'load-grunt-tasks' )( grunt );

	grunt.initConfig( {
		// watch for changes and trigger sass, jshint, uglify and livereload
		watch: {
			sass: {
				files: [ 'sass/**/*.{scss,sass}' ],
				tasks: [ 'sass', 'autoprefixer' ]
			},
			js: {
				files: '<%= jshint.all %>',
				tasks: [ 'jshint', 'uglify' ]
			}
		},
		// sass
		sass: {
			dist: {
				options: {
					style: 'expanded'
				},
				files: {
					'style.css': 'sass/style.scss'
				}
			}
		},
		// autoprefixer
		autoprefixer: {
			options: {
				browsers: [ 'last 2 versions', 'ie 9', 'ios 6', 'android 4' ],
				map: true
			},
			files: {
				expand: true,
				flatten: true,
				src: '*.css',
				dest: ''
			}
		},
		// javascript linting with jshint
		jshint: {
			options: {
				jshintrc: '.jshintrc',
				"force": true
			},
			all: [
				'gruntfile.js',
				'js/**/*.js'
			]
		},
		// uglify to concat, minify, and make source maps
		uglify: {
			frontend: {
				options: {
					sourceMap: 'js/main.js.map',
					sourceMappingURL: 'main.js.map',
					sourceMapPrefix: 2
				},
				files: {
					'js/main.min.js': [
						'js/navigation.js',
						'js/skip-link-focus-fix.js',
								//'js/scripts.js'
					]
				}
			}
		}
	} );

	// register task
	grunt.registerTask( 'default', [ 'sass', 'autoprefixer', 'uglify', 'watch' ] );
};