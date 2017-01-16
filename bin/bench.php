<?php

  $files = array();
  $names = explode(';', $argv[array_search('-f', $argv) + 1]);
  foreach($names as $name) {
    $files[] = file_get_contents($name);
  }

  $start = microtime(true);
  $mem = memory_get_usage(true);
  $count = 0;
  for($n = 0; $n < 1000; $n++) {
    foreach($files as $buffer) {
      $tokens = token_get_all($buffer);
      $count += count($tokens);
    }
  }
  $duration = (microtime(true) - $start) * 1000000 * 1000;
  $mem = memory_get_usage(true) - $mem;

  /*
  echo 'Tokens extracted      : ' . $count . "\n";
  echo 'Tokens by sec (x1000) : ' . round(($count / ($duration / 1000000 / 1000)) / 1000, 1) . "\n";
  echo 'Total duration        : ' . round($duration / 1000000, 2) . 'ms'."\n";
  echo 'Memory                : ' . round($mem / 1024) . 'kb' . "\n";
  */

  echo json_encode(array(
    'count' => $count,
    'memory' => $mem,
    'duration' => $duration
  ));
