module.exports = function(grunt) {
  'use strict';
  var gruntConfig = {
    pkg: grunt.file.readJSON('package.json'),
    assets: {
      src: 'assets'
    },
    concat: {
      options: {
        separator: ';',
      },
      js: {
        src: ['<%= assets.src %>/js/*.js', '!<%= assets.src %>/js/jquery.min.js', '!<%= assets.src %>/js/bootstrap.min.js'],
        dest: '<%= assets.src %>/js/main.js',
      },
      css: {
        src: ['<%= assets.src %>/css/*.css', '!<%= assets.scr %>/css/bootstrap.min.css'],
        dest: '<%= assets.src %>/css/main.css',
      },
    },

    imagemin: {
      dynamic: {
        files: [{
          expand: true,
          cwd: './',
          src: ['**/*.{png,jpg,gif}'],
        }]
      }
    },

    rsync: {
      options: {
        args: ["--verbose"],
        exclude: [".git*","*.scss","node_modules",".editorconfig","Gemfile","Gemfile.lock","*.yml"],
        recursive: true
      },

      prod: {
        options: {
          src: "",
          dest: "",
          host: "",
          syncDestIgnoreExcl: true,
          compareMode: "checksum"
        }
      },

      homolog: {
        options: {
          src: "",
          dest: "",
          host: "",
          port: "",
          syncDestIgnoreExcl: true,
          compareMode: "checksum"
        }
      }
    }
  };

  grunt.initConfig(gruntConfig);

  var keys = Object.keys(gruntConfig);
  var tasks = [];

  for(var i = 1, l = keys.length; i < l; i++) {
    tasks.push(keys[i]);
  }
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.loadNpmTasks("grunt-rsync");
  grunt.registerTask('default', tasks);
  grunt.registerTask('r', ['rsync']);
  grunt.registerTask('prod', ['rsync:prod']);
  grunt.registerTask('hom', ['rsync:homolog']);
  grunt.registerTask('build', ['imagemin', 'concat']);
};