'use strict';

module.exports = function(grunt) {

	// auto-load all grunt tasks matching the `grunt-*` pattern in package.json
	// no need for grunt.loadNpmTasks!
	require('load-grunt-tasks')(grunt);
	require('time-grunt')(grunt);
	
	// var mozjpeg = require('imagemin-mozjpeg');

	grunt.initConfig({

		/**
		*
		* Variables
		*
		*/
	
		// Variables from package.json
		pkg: grunt.file.readJSON( 'package.json' ),

		// Global variables
		vars: grunt.file.readJSON( 'gruntVars.json' ),
		
		// README
		rdm: 'README.md', 

		/**
		*
		* Grunt plugin configuration
		*
		*/

		bump: {
			options: {
				updateConfigs: ['pkg'], // make sure to check updated pkg variables
				push: false,
				commitFiles: ['-a'], // Commit all files
				createTag: false, // Branch is tagged by git flow
				commitMessage: 'Bump the version to %VERSION%',
				prereleaseName: 'rc',
			}
		},

		cacheBust: { // grunt-cache-bust
			// https://www.npmjs.com/package/grunt-cache-bust
            default: {
				options: {
					baseDir: '<%= vars.build_path %>',
					assets: [
						'<%= vars.build_path %>/assets/js/custom/**/*.js',
						'<%= vars.build_path %>/assets/css/custom/**/*.css'
					]
				},
				expand: true,
				cwd: '<%= vars.build_path %>/',
				src: ['<%= vars.build_path %>/**/*.php']
            }
        },

		clean: {
			dir_release: ['build/**/*'], // Clean out the release dir
			// copy_theme: ['release/<%= pkg.name %>.<%= pkg.version %>/<%= vars.theme_name %>.<%= pkg.version %>'],
		},

		compress: {
			static: {
				options: {
					mode: 'zip',
					archive: 'build/<%= vars.project %>.<%= pkg.version %>.zip'
				},
				expand: true,
				cwd: 'build/<%= vars.project %>.<%= pkg.version %>',
				src: ['**/*']
			},
		},

		copy: {
			static: {
				files: [ 
					{
						expand: true,
						dot: true, // Include dotfiles, e.g. `.htaccess`
						cwd: '<%= vars.dev_path %>', // Target dir
						src: [
							'**',
							'!assets/css/custom/style.css.map',
							'!assets/images/src/**',
						], 
						dest: '<%= vars.build_path %>',
					},
				],
			},
		},

		image: {
			dist: {
				options: {
					optipng: false,
					pngquant: true,
					zopflipng: true,
					jpegRecompress: false,
					mozjpeg: true,
					guetzli: false,
					gifsicle: true,
					svgo: true
				},
				files: [{
					expand: true,
					cwd: '<%= vars.assets %>/images/src',
					src: ['**/*.{png,jpg,jpeg,gif,svg}'],
					dest: '<%= vars.assets %>/images/dist'
				}]
			},
		},

		jshint: {
				options: {
						jshintrc: '.jshintrc',
						"force": true
				},
				all: [
						'Gruntfile.js',
						'<%= vars.assets %>/js/src/custom/**/*.js',
						'<%= vars.assets %>/assets/js/src/custom/**/*.js',
				]
		},

		modernizr: {
			dist: {
				// [REQUIRED] Path to the build you're using for development.
				"devFile" : "node_modules/grunt-modernizr/lib/modernizr-dev.js",

				// Path to save out the built file.
				"outputFile" : "assets/js/vendor/dist/modernizr-custom.js",
			}
		},

		postcss: {
			options: {
				map: true,
				processors: [
					require('autoprefixer')({browsers: ['last 1 version']})
				]
			},
			dist: {
				src: 'assets/css/custom/style.css'
			}
		},

		sass: {
			dist: {
				options: {
					style: 'expanded',
					sourceMap: true
				},
				files: {
					'<%= vars.assets %>/css/custom/style.css': 'sass/styles.scss',
				}
			}
		},

		version: {
				css: {
						options: {
							 prefix: 'Version\\:\\s'
						},
						src: [ 
								'sass/styles.scss',

								// Edit the version directly in the generated CSS file.
								// Avoids having to run the Sass task just for this. 
								'<%= vars.assets %>/css/custom/style.css'
						],
				},
				head: {
						options: {
							 prefix: 'Version\\:\\s'
						},
						src: [ 
								'<%= vars.dev_path %>/includes/head-shared.php',
						],
				},
				readme: {
						options: {
								prefix: 'Version\\:\\s'
						},
						src: [ '<%= rdm %>' ],
				},          
		},

		watch: {
			img: {
					files: ['<%= vars.assets %>/images/src/*.{png,jpg,jpeg,gif,webp,svg}'],
					tasks: ['imagemin:dist']
			},
			sass: {
				files: ['sass/**/*.{scss,sass}'],
				tasks: ['sass']
			},
			/* js: {
					files: '<%= jshint.all %>',
					tasks: ['jshint']
			},*/

			livereload: {
				options: { livereload: true },
				files: ['<%= vars.dev_path %>/**/*.{php,js,css,png,jpg,jpeg,gif,webp,svg}']
			}
		},

	});

	// Register tasks

	grunt.registerTask('default', [
		'image:dist',
		'sass',
		'copy',		
		'postcss', // Modernizr
		// 'cacheBust',
		'watch'
	]);
	grunt.registerTask('bump-minor', [
			'bump-only:minor',
			'version', 
			'bump-commit',        
	]);
	grunt.registerTask('bump-patch', [
			'bump-only:patch',
			'version', 
			'bump-commit',        
	]);
	grunt.registerTask('build', [

		'image:dist',	
		'postcss', // Modernizr	

		// Start with a clean release dir
		// If required, legacy releases can be rebuild based on their git tag
		// and running this task

		'clean:dir_release', 

		// NOTE
		// This task does not automatically bump the version
		// Precede with grunt bump-{minor|patch} to change the version across the project

		// Compile styles
		// Do this because if you haven't run grunt after switching to this branch, 
		// the CSS won't have been updated!
		'sass',

		// Make a copy of files for upload to the server

		/***
		 *
		 * We copy the dirs first so we can add the version to the zipped dir and
		 * remove some files we don't want.
		 *
		 */

		'copy:static',

		// Bust the cache
		// 'cacheBust',

		// Create an archive from the copies
		// 'compress', 

		// Delete the uncompressed copies
		// 'clean:copy_plugin', 
		// 'clean:copy_theme', 

		]);
	grunt.registerTask('copyassets', [
		'copy:font_awesome',
				'copy:deploy_scripts'       
	]);	
	grunt.registerTask('export', [
		'shell:exp'
	]); 
	grunt.registerTask('import', [
		'shell:imp'
	]); 

};
