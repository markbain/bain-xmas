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
        
        },
		


			// Modernizr
			modernizr: {
    			dist: {
        			// [REQUIRED] Path to the build you're using for development.
        			"devFile" : "bower_components/modernizr/modernizr.js",

        			// Path to save out the built file.
        			"outputFile" : "httpdocs/assets/js/vendor/modernizr-custom.js",
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
                    'httpdocs/assets/css/style.css': 'sass/styles.scss',
                }
            }
        },

        // autoprefixer
        autoprefixer: {
            options: {
                browsers: ['last 2 versions', 'ie 9', 'ios 6', 'android 4', 'android 3'],
                map: true,
					 silent: false,
            },
				dist: { // Target
					files: {
                	'httpdocs/assets/css/style.css': 'httpdocs/assets/css/style.css'
						}
            },
        },

		  	bump: {
    			options: {
      			updateConfigs: ['pkg'], // make sure to check updated pkg variables
      			createTag: false,
      			push: false,
    			}
  			},

	

		// Usemin
		useminPrepare: {
	      html: 'httpdocs/index.html',
	     	options: {
      		dest: 'rc'
    		}
	  },
	  usemin:{
	  	html: 'rc/index.html',
	  },

		 // Version
		 version: {
		 	css: {
        		options: {
            	prefix: 'Version\\:\\s'
        		},
        		src: [ 'rc/assets/css/source/style.css' ],
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
                'httpdocs/assets/js/source/**/*.js'
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
                    cwd: 'httpdocs/rc/assets/images/',
                    src: ['**/*.{png,jpg,gif}'],
                    dest: 'httpdocs/rc/assets/images/'
                }]
            }
        },

		  // Copy the plugin to a versioned release directory
		  copy: {
			dist: {
				files:  [
      			{expand: true, 
					cwd: 'rc/',
					src: [
						'**',						
					], 
					dest: 'dist/<%= pkg.name %>.<%= pkg.version %>/'},
				],
			},
			rc: {
				files:  [
      			{expand: true, 
					cwd: 'httpdocs/',
					src: [
						'**',
						'!assets/css/**',
						'!assets/js/**',					
						
					], 
					dest: 'rc/'},
				],
			},
			font_awesome: {
				 expand: true,
				 flatten: true,
				 src: ['bower_components/fontawesome/fonts/*'],
				 dest: 'httpdocs/assets/fonts'
			},
			modernizr: {
				 expand: true,
				 flatten: true,
				 src: ['bower_components/modernizr/modernizr.js'],
				 dest: 'httpdocs/assets/js/source/vendor'
			},
		},

		clean: {
			dist: [
				'dist/<%= pkg.name %>.<%= pkg.version %>'
			],
			rc: [
				'rc'
			],					
		},

		compress: {
			main: {
				options: {
					mode: 'zip',
					archive: 'dist/<%= pkg.name %>.<%= pkg.version %>.zip'
				},
				expand: true,
				cwd: 'dist/<%= pkg.name %>.<%= pkg.version %>',
				src: ['**/*'],
				dest: '<%= pkg.name %>/'
			}		
		}

    });

    // register tasks

    grunt.registerTask('default', [
	 	'sass', 
		'autoprefixer',
		'watch'
	]);

	// Create a release candidate for testing locally
	grunt.registerTask('rc', [
		'bump:patch',
		'clean:rc', // delete previous rc
		'copy:rc', 		
		'useminPrepare',
			'concat:generated',
			'uglify:generated',
			'cssmin:generated',
		'usemin',
		'imagemin',
	]);
	
	// Copy assets from bower_components to theme dir
	grunt.registerTask('copybower', [
		'copy:font_awesome',
		'copy:modernizr'
	]);	

	// Compress current rc for upload to server
	grunt.registerTask('dist', [
		'bump:minor',
		// 'version',
		'copy:dist', 				
		'compress',
		'clean:dist',
	]);	

};
