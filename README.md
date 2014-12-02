DN Digital WordPress Theme
===



By Mark Bain Design
---


Setup
---
* Open project directory in terminal and run `npm install` to install all grunt plugins
* Run `bower install` to download Bower components (and their dependencies) as listed in bower.js and place them in the "/assets" directory.
* Run `grunt copybower`to copy assets from bower_components to the theme.

Usage
---
* Run `grunt` to execute default tasks
* Run `grunt imagemin`to minify images
* Run `grunt build` to output build files
* Load all styles/scripts via `functions.php`and concat/uglify with a plugin
