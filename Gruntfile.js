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
      all: {
        options:{
          port: 9000,
          hostname: "0.0.0.0",
          // Prevents Grunt to close just after the task (starting the server) completes
          // This will be removed later as `watch` will take care of that
          keepalive: true
        }
      }
    }
  });

  // Creates the `server` task
  grunt.registerTask('server',[
    'connect'
  ]);
};