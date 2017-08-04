module.exports = (grunt) ->
  grunt.loadNpmTasks 'grunt-sass'
  grunt.loadNpmTasks 'grunt-contrib-watch'
  grunt.loadNpmTasks 'grunt-contrib-cssmin'

  grunt.initConfig
    pkg: grunt.file.readJSON 'package.json'

    sass:
      dist:
        options:
          style: 'compressed'
        files: [
          expand: true
          cwd: 'sass'
          src: ['*.sass']

          dest: 'styles'
          ext: '.css'
        ]

    cssmin:
      dist:
        files:
          'styles/main.min.css': 'styles/main.css'

    watch:
      sass:
        files: ['sass/*.sass', 'sass/**/*.sass']
        tasks: ['sass', 'cssmin']

  grunt.registerTask 'default', ['sass', 'cssmin']
