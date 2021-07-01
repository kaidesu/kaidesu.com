---
title: "Use Laravel Mix in stand alone projects"
publishAt: 2017-08-27
draft: false
---

#### Install Laravel Mix and Webpack
Using yarn or npm, install both Laravel Mix and Webpack to your project. I will be utilizing yarn in the examples below.

```
yarn add webpack laravel-mix
```

#### Copy the Laravel Mix Configuration

```
cp -r node_modules/laravel-mix/setup/webpack.mix.js ./
```

#### Add Compilation Scripts to Your package.json

```json
"scripts": {
    "dev": "NODE_ENV=development webpack --progress --hide-modules --config=node_modules/laravel-mix/setup/webpack.config.js",
    "watch": "NODE_ENV=development webpack --watch --progress --hide-modules --config=node_modules/laravel-mix/setup/webpack.config.js",
    "hot": "NODE_ENV=development webpack-dev-server --inline --hot --config=node_modules/laravel-mix/setup/webpack.config.js",
    "production": "NODE_ENV=production webpack --progress --hide-modules --config=node_modules/laravel-mix/setup/webpack.config.js"
}
```

You're now all set! Simply hop in your webpack.mix.js file to configure the files you wish to compile.