// Matt Moehr
// Oct 16, 2015
// stolen from http://rhumaric.com/2013/05/reloading-magic-with-grunt-and-livereload/

module.exports = function(grunt) {

  // Load Grunt tasks declared in the package.json file
  require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

  // Configure Grunt 
  grunt.initConfig({

    // grunt-contrib-connect will serve the files of the project
    // on specified port and hostname
     connect: {
      options: {
        port: 9000,
        open: true,
        livereload: 35729,
        // Change this to '0.0.0.0' to access the server from outside
        hostname: 'localhost'
      },
      livereload: {
        options: {
          middleware: function(connect) {
            return [
              connect.static('.tmp'),
              connect().use('/bower_components', connect.static('./bower_components')),
              connect.static('/')
            ];
          }
        }
      }
    },


    // grunt-open will open your browser at the project's URL
    open: {
      all: {
        // Gets the port from the connect configuration
        path: 'http://localhost:<%= connect.all.options.port%>'
      }
    },

    // Add vendor prefixed styles
    autoprefixer: {
      options: {
        browsers: ['> 1%', 'last 2 versions', 'Firefox ESR', 'Opera 12.1']
      },
      dist: {
        files: [{
          expand: true,
          cwd: '.tmp/styles/',
          src: '{,*/}*.css',
          dest: '.tmp/styles/'
        }]
      }
    },

    watch: {
      livereload: {
        options: {
          livereload: true
        },
        files: [
          '/{,*/}*.html',
          '/{,*/}*.css',
          '/{,*/}*.js'
        ] 
      }
    }
  });

  // Creates the `serve` task
  grunt.registerTask('serve', 'start the server and preview your app', 
                     function (target) {
    grunt.task.run([
      'concurrent:server',
      'autoprefixer',
      'connect:livereload',
      'watch'
    ]);
  });
};