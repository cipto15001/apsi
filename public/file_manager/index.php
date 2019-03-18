<!doctype html>
<html lang="en" data-ng-app="FileManagerApp">
<head>
  <!--
    * Angular FileManager v1.5.1 (https://github.com/joni2back/angular-filemanager)
    * Jonas Sciangula Street <joni2back@gmail.com>
    * Licensed under MIT (https://github.com/joni2back/angular-filemanager/blob/master/LICENSE)
  -->
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <meta charset="utf-8">
  <title>angular-filemanager</title>

  <!-- third party -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/angular/angular.min.js"></script>
    <script src="node_modules/angular-translate/dist/angular-translate.min.js"></script>
    <script src="node_modules/ng-file-upload/dist/ng-file-upload.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="node_modules/bootswatch/paper/bootstrap.min.css" />
  <!-- /third party -->

  <!-- Uncomment if you need to use raw source code
    <script src="file_manager/src/js/app.js"></script>
    <script src="file_manager/src/js/directives/directives.js"></script>
    <script src="file_manager/src/js/filters/filters.js"></script>
    <script src="file_manager/src/js/providers/config.js"></script>
    <script src="file_manager/src/js/entities/chmod.js"></script>
    <script src="file_manager/src/js/entities/item.js"></script>
    <script src="file_manager/src/js/services/apihandler.js"></script>
    <script src="file_manager/src/js/services/apimiddleware.js"></script>
    <script src="file_manager/src/js/services/filenavigator.js"></script>
    <script src="file_manager/src/js/providers/translations.js"></script>
    <script src="file_manager/src/js/controllers/main.js"></script>
    <script src="file_manager/src/js/controllers/selector-controller.js"></script>
    <link href="src/css/animations.css" rel="stylesheet">
    <link href="src/css/dialogs.css" rel="stylesheet">
    <link href="src/css/main.css" rel="stylesheet">
  -->

  <!-- Comment if you need to use raw source code -->
    <link href="file_manager/dist/angular-filemanager.min.css" rel="stylesheet">
    <script src="file_manager/dist/angular-filemanager.min.js"></script>
  <!-- /Comment if you need to use raw source code -->

  <script type="text/javascript">

    function getParamater(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, '\\$&');
        var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, ' '));
    }

    //example to override angular-filemanager default config
    angular.module('FileManagerApp').config(['fileManagerConfigProvider', function (config) {
      var defaults = config.$get();
      var workspace = getParamater('id');

      console.log(config.$get());

      config.set({
        appName: 'angular-filemanager',
        listUrl: 'http://localhost:8000/api/file_manager/list?id=' + workspace,
        renameUrl: 'http://localhost:8000/api/file_manager/rename?id=' + workspace,
        moveUrl: 'http://localhost:8000/api/file_manager/move?id=' + workspace,
        copyUrl: 'http://localhost:8000/api/file_manager/copy?id=' + workspace,
        removeUrl: 'http://localhost:8000/api/file_manager/remove?id=' + workspace,
        createFolderUrl: 'http://localhost:8000/api/file_manager/createFolder?id=' + workspace,
        uploadUrl: 'http://localhost:8000/api/file_manager/upload?id=' + workspace,
        downloadFileUrl: 'http://localhost:8000/api/file_manager/download?id=' + workspace,
        getContentUrl: 'http://localhost:8000/api/file_manager/getContent?id=' + workspace,
        editUrl: 'http://localhost:8000/api/file_manager/edit?id=' + workspace,

        pickCallback: function(item) {
          var msg = 'Picked %s "%s" for external use'
            .replace('%s', item.type)
            .replace('%s', item.fullPath());
          window.alert(msg);
        },

        allowedActions: angular.extend(defaults.allowedActions, {
          upload: true,
          rename: true,
          move: true,
          copy: true,
          getContent: true,
          edit: true,
          changePermissions: false,
          compress: false,
          compressChooseName: false,
          extract: false,
          download: true,
          downloadMultiple: false,
          preview: true,
          remove: true,
          createFolder: true,
          pickFiles: false,
          pickFolders: false,
            
        }),
        isEditableFilePattern: /\.(txt|sh|diff?|patch|svg|asc|cnf|cfg|conf|html?|.html|cfm|cgi|aspx?|ini|pl|py|md|css|cs|js|jsp|log|htaccess|htpasswd|gitignore|gitattributes|env|json|atom|eml|rss|markdown|sql|xml|xslt?|sh|rb|as|bat|cmd|cob|for|ftn|frm|frx|inc|lisp|scm|coffee|php[3-6]?|java|c|cbl|go|h|scala|vb|tmpl|lock|go|yml|yaml|tsv|lst|out|run|sph|lammps)$/i,
      });
    }]);
  </script>
</head>

<body class="ng-cloak">
  <angular-filemanager></angular-filemanager>

  <script>
    // (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    // (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    // m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    // })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    // ga('create', 'UA-35182652-1', 'auto');
    // ga('send', 'pageview');
  </script>
</body>
</html>
