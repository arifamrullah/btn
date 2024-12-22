module.exports = function(grunt) {
  "use strict";
 
  grunt.initConfig({
    wordpressdeploy: {
      options: {
        backup_dir: "backups/",
        rsync_args: ['--verbose', '--progress', '-rlpt', '--compress', '--omit-dir-times', '--delete'],
        exclusions: ['Gruntfile.js', '.git/', 'tmp/*', 'backups/', 'composer.json', 'composer.lock', 'README.md', '.gitignore', 'package.json', 'node_modules','.htaccess']
      },
      local: {
        "title": "local",
        "database": "smooets_btn",
        "user": "root",
        "pass": "",
        "host": "localhost",
        "url": "http://localhost/smooets/btn/",
        "path": "/Users/nick/public_html/smooets/btn/"
      },
      staging: {
        "title": "staging",
        "database": "btn_db",
        "user": "btn",
        "pass": "cdnCbkak8bU8kC2r",
        "host": "localhost",
        "url": "http://btn-vb.stagingapps.net/",
        "path": "/home/btn-dev/www",
        "ssh_host": "btn-dev@202.138.229.148"
      },
      staging2: {
        "title": "staging2",
        "database": "smooets_btn",
        "user": "btn",
        "pass": "Today1234",
        "host": "db.dexcort.net",
        "url": "http://btn.staging.smooets.com/",
        "path": "/home/staging/btn",
        "ssh_host": "staging@smooets.com"
      },
      production: {
        "title": "Production",
        "database": "btn_digital",
        "user": "root",
        "pass": "btnDigital",
        "host": "localhost",
        "url": "http://43.231.128.127/",
        "path": "/var/www/html",
        "ssh_host": "customer@43.231.128.127:12323"
      }
    },
  });
 
  // Load tasks 
  grunt.loadNpmTasks('grunt-wordpress-deploy');
 
  // Register tasks 
  grunt.registerTask('default', [
    'wordpressdeploy'
  ]);
};