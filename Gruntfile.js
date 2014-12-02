'use strict';
module.exports = function(grunt) {

    // auto-load all grunt tasks matching the `grunt-*` pattern in package.json
    require('load-grunt-tasks')(grunt); // no need for grunt.loadNpmTasks!

    grunt.initConfig({
			pkg:    grunt.file.readJSON( 'package.json' ),
        
		 // watch for changes and trigger sass, jshint, uglify and livereload
        watch: {
            sass: {
					options: { 
						sourcemap: true 
					},
                files: ['sass/**/*.{scss,sass}'],
                tasks: [
					 	'sass', 
						'autoprefixer'
					]
            },
            js: {
                files: '<%= jshint.all %>',
                tasks: ['jshint']
            },
            livereload: {
                options: { livereload: true },
                files: [ 
					 	'httpdocs/wp-content/themes/<%= pkg.name %>/*.php', 
						'httpdocs/wp-content/themes/<%= pkg.name %>/lib/**/*.php', 
						'Gruntfile.js',
						'httpdocs/wp-content/themes/<%= pkg.name %>/style.css', 
						'httpdocs/wp-content/themes/<%= pkg.name %>/assets/js/source/**/*.js', 
						'httpdocs/wp-content/themes/<%= pkg.name %>/assets/images/**/*.{png,jpg,jpeg,gif,webp,svg}']
            }
        },
		


			// Modernizr
			modernizr: {
    			dist: {
        			// [REQUIRED] Path to the build you're using for development.
        			"devFile" : "bower_components/modernizr/modernizr.js",

        			// Path to save out the built file.
        			"outputFile" : "httpdocs/wp-content/themes/<%= pkg.name %>/assets/js/source/vendor/modernizr-custom.js",
		    	}

			},

        // sass
        sass: {
            dist: {
                options: {
                    sourcemap: true,
                    style: 'expanded',
                },
                files: {
                    'httpdocs/wp-content/themes/<%= pkg.name %>/style.css': 'sass/styles.scss',
                }
            }
        },

        // autoprefixer
        autoprefixer: {
            options: {
                browsers: ['last 2 versions', 'ie 9', 'ios 6', 'android 4', 'android 3'],
                // map: true
            },
            files: {
                expand: true,
                flatten: true,
                src: 'httpdocs/wp-content/themes/<%= pkg.name %>/style.css',
                dest: 'httpdocs/wp-content/themes/<%= pkg.name %>'
            },
        },

		  	bump: {
    			options: {
      			updateConfigs: ['pkg'], // make sure to check updated pkg variables
      			createTag: false,
      			push: false,
    			}
  			},

		 // Version
		 version: {
		 	css: {
        		options: {
            	prefix: 'Version\\:\\s'
        		},
        		src: [ 'httpdocs/wp-content/themes/<%= pkg.name %>/style.css' ],
   		}
		},


        // javascript linting with jshint
        jshint: {
            options: {
                jshintrc: '.jshintrc',
                "force": true
            },
            all: [
                'Gruntfile.js',
                'httpdocs/wp-content/themes/<%= pkg.name %>/assets/js/source/**/*.js'
            ]
        },



        // image optimization
        imagemin: {
            dist: {
                options: {
                    optimizationLevel: 7,
                    progressive: true,
                    interlaced: true
                },
                files: [{
                    expand: true,
                    cwd: 'httpdocs/wp-content/themes/<%= pkg.name %>/assets/images/',
                    src: ['**/*.{png,jpg,gif}'],
                    dest: 'httpdocs/wp-content/themes/<%= pkg.name %>/assets/images/'
                }]
            }
        },

		  // Copy the plugin to a versioned release directory
		  copy: {
			main: {
				files:  [
					// includes files within path and its sub-directories
      			{expand: true, 
					cwd: 'httpdocs/wp-content/themes/<%= pkg.name %>/',
					src: [
						'**',
						'!style.css.map'
					], 
					dest: 'release/<%= pkg.name %>.<%= pkg.version %>/'},
					],
			},
			font_awesome: {
				 expand: true,
				 flatten: true,
				 src: ['bower_components/fontawesome/fonts/*'],
				 dest: 'httpdocs/wp-content/themes/<%= pkg.name %>/assets/fonts'
			},
			svg_morpheus: {
				 expand: true,
				 flatten: true,
				 src: ['bower_components/svg-morpheus/compile/unminified/*.js'],
				 dest: 'httpdocs/wp-content/themes/<%= pkg.name %>/assets/js/source/vendor'
			}
		},

		clean: {
			main: ['release/<%= pkg.name %>.<%= pkg.version %>']
		},

		compress: {
			main: {
				options: {
					mode: 'zip',
					archive: 'release/<%= pkg.name %>.<%= pkg.version %>.zip'
				},
				expand: true,
				cwd: 'release/<%= pkg.name %>.<%= pkg.version %>',
				src: ['**/*'],
				dest: '<%= pkg.name %>/'
			}		
		}

    });

    // register tasks

    grunt.registerTask('default', [
	 	'sass', 
		'modernizr',		
		'watch'
	]);

	grunt.registerTask('build', [
		'autoprefixer',
		'bump',
		'version',
		'copy', 
		'imagemin',
		'compress',
		'clean'
	]);
	
	// Copy assets from bower_components to theme dir
	grunt.registerTask('copybower', [
		'copy:font_awesome',
		'copy:svg_morpheus'
	]);	

};
