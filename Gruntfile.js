// Matt Moehr
// November 3, 2015
// stole from: http://fettblog.eu/php-browsersync-grunt-gulp/

'use strict';

module.exports = function(grunt) {
    grunt.loadNpmTasks('grunt-browser-sync');
    grunt.loadNpmTasks('grunt-php');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.initConfig({
        watch: {
            all: {
                files: ['**/*.php', '**/*.html', '**/*.css', '**/*.js'],
                options: {
                    interval: 1500
                }
            }
        },
        browserSync: {
            dev: {
                bsFiles: {
                    src: '**/*.php'
                },
                options: {
                    proxy: '127.0.0.1:8010', //our PHP server
                    port: 8080, // our new port
                    open: true,
                    watchTask: true
                }
            }
        },
        php: {
            dev: {
                options: {
                    port: 8010,
                    //base: 'C:\\Users\\moehr\\Documents\\GitHub\\data-dissemination-portal'
                }
            }
        }
    });

    grunt.registerTask('default', ['php', 'browserSync', 'watch']);
};