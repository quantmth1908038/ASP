<?php
/**
 * このディレクトリ(deployer)配下のPHPファイルを require_once する。
 */

function require_children($dir) {
  $h = opendir($dir);
  while ($name = readdir($h)) {
    // '.' '..' と自分自身は除外
    if (in_array($name, ['.', '..', basename(__FILE__)])) continue;

    $fullpath = $dir . DIRECTORY_SEPARATOR . $name;
    if (is_dir($fullpath)) {
      // recursive call
      require_children($fullpath);
    } else if (preg_match('/\.php$/', $fullpath)) {
      // PHP file
      // echo $fullpath . "\n";
      require_once $fullpath;
    }
  }
  closedir($h);
}

require_children(dirname(__FILE__));
