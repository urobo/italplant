# ITALPLANT
Wordpress theme based on https://github.com/davidmanson/monsieurpress/


## Requirements
- A working WordPress installation
- Npm (packaged in node)

## How to use?
Go to your wordpress theme folder with your terminal, and type the following commands :

    $ cd [yourthemename]
	$ npm install
	$ gulp

## Gulp tasks
Some embeded gulp tasks that can be use for you workflow :

- `gulp` : Watch the `scss` directory and compile files to the style.css file
- `gulp styles` : Just compile the scss (no watching)
- `gulp minify` : Minify the style.css file, do this before production
- `gulp images` : Compress images located in the images folder
- `gulp compress` : Minify the javascript
