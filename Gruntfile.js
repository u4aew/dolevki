module.exports = function(grunt) {

    // 1. Вся настройка находится здесь
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        concat: {
            dist: {
                src: [
                        'themes/default/web/js/jquery-ui-1.10.3.custom.min.js',
                        'themes/default/web/js/jquery.li-translit.js',
                        'themes/default/web/js/lightslider.js',
                        'themes/default/web/js/jquery.fancybox.js',
                        'themes/default/web/js/jquery.fancybox.pack.js',
                        'themes/default/web/js/jquery.sumoselect.js',
                        'themes/default/web/js/sort-list-apartment.js',
                        'themes/default/web/js/slide.js',
                        'themes/default/web/js/sidebar.js',
                        'themes/default/web/js/mobile-siderbar.js',
//                    'themes/default/web/js/*.js', // Все JS в папке libs
                ],
                dest: 'themes/default/web/js/build/production.js',
            }
        },
        uglify: {
            build: {
                src: 'themes/default/web/js/build/production.js',
                dest: 'themes/default/web/js/build/production.min.js'
            }
        },
        cssmin: {
            options: {
                shorthandCompacting: false,
                roundingPrecision: -1
            },
            target: {
                files: {
                    'themes/default/web/css/build/production.min.css': ['themes/default/web/css/*.css']
                }
            }
        }

    });

    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');

    grunt.registerTask('default', ['concat', 'uglify']);

};