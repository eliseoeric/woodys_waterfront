'use strict';
module.exports = function(grunt) {
  // Load all tasks
  require('load-grunt-tasks')(grunt);
  // Show elapsed time
  require('time-grunt')(grunt);

  grunt.loadNpmTasks('grunt-contrib-jshint');
  
  var jsFileList = [
    'js/src/AccordionTabs.js',
    'js/src/AnimationFrameDispatch.js',
    'js/src/Vector.js',
    'js/src/Dimensions.js',
    'js/src/BackgroundStrategy.js',
    'js/src/SolidBackground.js',
    'js/src/ImageBackground.js',
    'js/src/VideoBackground.js',
    'js/src/BezierMask.js',
    'js/src/ScalableBezier.js',
    'js/src/ElementDimensions.js',
    'js/src/Layer.js',
    'js/src/TemporaryCanvas.js',
    'js/src/WaveElement.js',
    'js/src/Slick.js',
    'js/src/wavy.js',
    'js/libs/jquery.waypoints.js',
    'js/libs/sticky.min.js',
    'js/navigation.js',
    'js/skip-link-focus-fix.js',
    'js/main.js',
  ];

  // Project configuration.
  grunt.initConfig({
    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      all: [
        'Gruntfile.js',
        'assets/js/*.js',
        '!assets/js/scripts.js',
        '!assets/js/vendor/*',
        '!assets/**/*.min.*'
      ]
    },
    sass: {                              // Task
      watch: {                            // Target
        options: {                       // Target options
          style: 'expanded',
          compass: true,
          lineNumbers: true,
        },
        files: {                         // Dictionary of files
          'css/app.css': 'sass/app.scss',       // 'destination': 'source'
          'css/slick/slick.css': 'sass/slick/slick.scss',
          'css/slick/slick-theme.css': 'sass/slick/slick-theme.scss',
          'css/font-awesome/font-awesome.css': 'sass/font-awesome/font-awesome.scss'
          // 'widgets.css': 'widgets.scss'
        }
      },
      build: {                            // Target
        options: {                       // Target options
          style: 'compressed',
          compass: true
        },
        files: {                         // Dictionary of files
          'css/app.css': 'sass/app.scss',       // 'destination': 'source'
          // 'widgets.css': 'widgets.scss'
        }
      },
    },
    concat: {
      options: {
        separator: ';',
      },
      dist: {
        src: [jsFileList],
        dest: 'js/app.js',
      },
    },
    uglify: {
      dist: {
        files: {
          'js/app.min.js': 'js/app.js',
        }
      }
    },
    modernizr: {
      build: {
        devFile: 'assets/js/vendor/modernizr.js',
        outputFile: 'assets/js/vendor/modernizr.min.js',
        files: {
          'src': [
            ['assets/js/scripts.min.js'],
            ['assets/js/admin.min.js'],
            ['assets/js/program_filter.min.js'],
            ['assets/js/swiftype.min.js']
          ]
        },
        uglify: true,
        parseFiles: true
      }
    },
    watch: {
      sass: {
      files: ['sass/{,*/}*.scss'],
      tasks: ['sass:watch']
      },
      js: {
        files: jsFileList,
        tasks: ['concat']
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-modernizr');
  grunt.loadNpmTasks('grunt-wp-assets');
  
  // // Load local tasks.
  // grunt.loadTasks('tasks');

  grunt.registerTask('build', [
      // 'jshint',
      'sass:build',
      // 'autoprefixer:build',
      'concat',
      'uglify',
      // 'modernizr',
    ]);

  // grunt.registerTask('watch', [
  //   'sass:watch'
  //   ]);

};
