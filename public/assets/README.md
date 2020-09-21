## Gulp

**Requirements**

* node
* npm
* gulp

**Installing**

Run `npm install` from the root of your project to create your `node_modules` folder.

Run `npm install gulp-cli -g` and `npm install gulp -D` to install gulp.

**Usage**

*Run these commands from the root of your project.*

Run `gulp build` to build the necessary sass files for your project.

Run `gulp watch` to run the watcher.

**Errors**

If you have any problems in a fresh project trying to `npm install` with errors then delete `package-lock.json`
and run this command `npm install --unsafe-perm=true --allow-root`

## Webpack - Encore

**Installing**

Run `npm install @symfony/webpack-encore --save-dev`

Run `npm install vue vue-loader@^15.0.11 vue-template-compiler vue-router --save-dev`

Run `npm install webpack-notifier@^1.6.0 --save-dev`

Run `npm install --save core-js regenerator-runtime`

**Usage**

*Run these commands from the root of your project.*

*Suggestion: Run the scripts instead of the actual commands*

Compile assets once

Run `npm run encore dev` or shorthand `npm run encore:dev`

or, recompile assets automatically when files change

Run `npm run encore dev --watch` or shorthand `npm run encore:dev:watch`

on deploy, create a production build

Run `npm run encore production` or shorthand `npm run encore:prod`

####Hot Module Replacement (HMR)

The `vue-loader` supports hot module replacement: just update your code and watch your Vue.js app update without a browser refresh! To activate it, use the `dev-server` with the `--hot` option:

Compile assets once with HMR

Run `npm run encore dev --hot` or shorthand `npm run encore:dev:hot`

or, recompile assets automatically when files change with HMR

Run `npm run encore dev --hot --watch` or shorthand `npm run encore:dev:hot:watch`

## Axios

**Installing**

Run `npm i --save axios`