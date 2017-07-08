module.exports = function (grunt) {
       
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        concat: {
            options: {
                banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
            },
            build: {
                src: [
                    'bower_components/jquery/dist/jquery.js', 
                    'bower_components/bootstrap/dist/js/bootstrap.js'
                ],
                dest: 'public_html/components/<%= pkg.name %>.js'
            }
        },
               
        uglify: {
            options: {
                banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
            },
            build: {
                src: ['bower_components/**/dist/*.min.js', 'bower_components/**/dist/js/*.min.js'],
                dest: 'public_html/components/<%= pkg.name %>.min.js'
            }
        }                        
    });
           
    var defaultTasks = [];
       
     grunt.log.write('environment: ');  
     grunt.log.write(grunt.option('env'));
     
     if (grunt.option('env') !== 'production'){
         grunt.loadNpmTasks('grunt-contrib-concat'); 
         defaultTasks.push('concat');
     }
        
     
     if (grunt.option('env') === 'production'){
        grunt.loadNpmTasks('grunt-contrib-uglify'); 
        defaultTasks.push('uglify');
    }
    
    grunt.registerTask('default', defaultTasks);


};