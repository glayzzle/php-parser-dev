# php-parser-tests

Separate repository in order to test the php-parser library

# Try it

```sh
$ cd bin
$ node test.js -e "echo 'Hello World';"
```

# Join the dev

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
