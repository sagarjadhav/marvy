'use strict';
module.exports = function ( grunt ) {

	// load all grunt tasks matching the `grunt-*` pattern
	// Ref. https://npmjs.org/package/load-grunt-tasks
	require( 'load-grunt-tasks' )( grunt );

	grunt.initConfig( {
		// SCSS and Compass
		// Ref. https://npmjs.org/package/grunt-contrib-compass
		compass: {
			frontend: {
				options: {
					config: 'config.rb',
					force: true
				}
			}
		},
		// Uglify
		// Compress and Minify JS files in js/rtp-main-lib.js
		// Ref. https://npmjs.org/package/grunt-contrib-uglify
		uglify: {
			options: {
				banner: '/*! \n * Marvy JavaScript Library \n * @package Marvy \n */'
			},
			build: {
				src: [
					'assets/js/vendors/hammer.min.js',
					'assets/js/vendors/sideNav.js',
					'assets/js/scripts.js'
				],
				dest: 'assets/js/package-min.js'
			}
		},
		// Watch for hanges and trigger compass and uglify
		// Ref. https://npmjs.org/package/grunt-contrib-watch
		watch: {
			compass: {
				files: [ '**/*.{scss,sass}' ],
				tasks: [ 'compass' ]
			},
			uglify: {
				files: '<%= uglify.build.src %>',
				tasks: [ 'uglify' ]
			}
		}
	} );

	// Register Task
	grunt.registerTask( 'default', [ 'watch' ] );
};