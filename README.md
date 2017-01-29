# php-parser-dev

Separate repository in order to test the php-parser library. If you want to test it over a specific php library, open an issue.

[![npm version](https://badge.fury.io/js/php-parser.svg)](https://www.npmjs.com/package/php-parser)
[![Build Status](https://travis-ci.org/glayzzle/php-parser-dev.svg?branch=master)](https://travis-ci.org/glayzzle/php-parser-dev)
[![Coverage Status](https://coveralls.io/repos/github/glayzzle/php-parser-dev/badge.svg?branch=master)](https://coveralls.io/github/glayzzle/php-parser-dev?branch=master)
[![Gitter](https://img.shields.io/badge/GITTER-join%20chat-green.svg)](https://gitter.im/glayzzle/Lobby)

## Try it

```sh
$ cd bin
$ node test.js -e "echo 'Hello World';"
```

## List of tested frameworks

* [beaba](https://github.com/ichiriac/beaba)
* [laravel](https://github.com/laravel/laravel)
* [zf2](https://github.com/zendframework/zf2)
* [symfony](https://github.com/symfony/symfony)
* [tcpdf](https://github.com/tecnickcom/TCPDF)
* [evernote-cloud-sdk-php](https://github.com/evernote/evernote-cloud-sdk-php)
* [yii2](https://github.com/yiisoft/yii2)
* [CodeIgniter](https://github.com/bcit-ci/CodeIgniter)
* [magento1](https://github.com/bragento/magento-core)
* [magento2](https://github.com/magento/magento2)
* [opencart](https://github.com/opencart/opencart)
* [php-langspec](https://github.com/glayzzle/php-langspec)
* [wordpress](https://github.com/WordPress/WordPress)
* if you want another framework to be tested, just report an issue

## Join the dev

In order to contribute you must fork the php-parser project :

```
git clone https://github.com/[your-name]/php-parser
git checkout -b develop
```

In order to keep merging & pull requests simple, you may use the `develop` branch.

If you want to change/fix the lexer you will find code to `./src/lexer/`.
You can also implement the parser, the code is into `./src/parser/`.

In order to test your changes, checkout/fork this project, and make
a symlink from `php-parser` to the ̀`lib` folder.

To check your changes add tests into `./test/parser/`, and run `npm run test`.
Try to keep or improve the coverage levels.

The command line options :

```sh
Usage: test [options] [-f] <file>

  -f <file>                      Parse and test the specified file
  -d <path>                      Parse each file in the specified path
  -r                             Use recursivity with the specified path
  -e                             Eval the specified input and shows AST
  -v                             Enable verbose mode and show debug
  -h, --help                     Print help and exit
```

If you run into problems with a test, run it with the cli and add the `--debug` flag.
