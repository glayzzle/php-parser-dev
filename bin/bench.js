/**

Bench to chose between Nested Arrays or Object for AST :

Array Write 4.6 ms
Object Write 5.6 ms

Array Memory 210 kb
Object Memory 696 kb

Array Read 1.8 ms
Object Read 11.8 ms

**/

var fs = require('fs');
var memwatch = require('memwatch-next');

function duration(text, hrTime) {
  var diff = process.hrtime(hrTime);
  diff = diff[0] * 1000000 + diff[1] / 1000;
  // console.log(text, Math.round(diff / 1000) + 'ms');
  return Math.round(diff / 1000);
}

// preparing files for tests
var files = [];
var path = __dirname + '/../test/token/';
var items = fs.readdirSync(path);
for(var i = 0; i < items.length; i ++) {
  var file = items[i];
  if (file[0] != '.') {
    var stat = fs.statSync(path + file);
    if (!stat.isDirectory()) {
      files.push(
        fs.readFileSync(path + file, {
          encoding: 'binary'
        })
      );
    }
  }
}

// test FN
function consumeTokens(engine, files) {
  if (typeof global.gc === 'function') global.gc();
  var tSize = 0;
  var hd = new memwatch.HeapDiff();
  var hrstart = process.hrtime();
  for(var n = 0; n < 1000; n++) { // repeat tests to increase accuracy
    for(var i = 0; i < files.length; i++) {
      engine.lexer.setInput(files[i]);
      var EOF = engine.lexer.EOF;
      var token = engine.lexer.lex() || EOF;
      while(token != EOF) {
        token = engine.lexer.lex() || EOF;
        tSize++;
      }
    }
  }
  var  hrend = process.hrtime(hrstart);
  diff = hd.end();
  var duration = (hrend[0] * 1000000 * 1000) + hrend[1];
  console.log('Tokens extracted      :', tSize);
  console.log('Tokens by sec (x1000) :', (Math.round((tSize / (duration / 1000000 / 1000)) / 100) / 10));
  console.log('Total duration        :', Math.round(duration / 100000) / 10, 'ms');
  console.log('Memory                : ', Math.round((diff.after.size_bytes - diff.before.size_bytes) / 1024), 'kb');
  return {
    duration: duration,
    memory: diff.after.size_bytes - diff.before.size_bytes
  };
}

function compareResults(a, b) {
  if (a.duration < b.duration) {
    console.log('Is ' + Math.round(((b.duration / a.duration) - 1) * 100) + '% more rapid');
  } else {
    console.log('Is ' + Math.round(((a.duration / b.duration) - 1) * 100) + '% more slower');
  }
  if (a.memory < b.memory) {
    console.log('Use ' + Math.round((1 - (a.memory / b.memory)) * 100) + '% less memory ');
  } else {
    console.log('Use ' + Math.round((1 - (b.memory / a.memory)) * 100) + '% more memory ');
  }
}

// parsing tests
if (typeof global.gc === 'function') global.gc();
console.log('\n--- parsing files - actual lexer version :');
var engine = require('../lib/src/index');
engine = new engine({
  lexer: {
    asp_tags: true,
    short_tags: true
  }
});
var actual = consumeTokens(engine, files);

// test the old library version
if (typeof global.gc === 'function') global.gc();
console.log('\n--- parsing files - jison lexer version :');
engine.lexer = require('./jison-lexer');
engine.lexer.asp_tags = true;
engine.lexer.short_tags = true;
var jison = consumeTokens(engine, files);

// original php results
console.log('\n--- parsing files - plain PHP version :');
var cmd = require('./formats/cmd');
var result = cmd.exec('php -d short_open_tag=1 ' + __dirname + '/bench.php -d ' + path);
var php = false;
try {
  php = JSON.parse(result.stdout);
  console.log('Tokens extracted      :', php.count);
  console.log('Tokens by sec (x1000) :', (Math.round((php.count / (php.duration / 1000000 / 1000)) / 100) / 10));
  console.log('Total duration        :', Math.round(php.duration / 100000) / 10, 'ms');
  console.log('Memory                : ', Math.round(php.memory / 1024), 'kb');
} catch(e) {
  console.log('Fail to parse output : ', result.stdout);
}


// results
console.log('\n--- results Actual vs Jison :');
compareResults(actual, jison);
console.log('\n--- results Actual vs PHP :');
compareResults(actual, php);
console.log('\n--- results Jison vs PHP :');
compareResults(jison, php);
