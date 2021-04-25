<?php
namespace Deployer;

/**
 * Describe releases
 */
desc('Describe releases on each hosts.');
task('releases', function () {
  $host = Task\Context::get()->getHost();
  $hostname = $host->getHostname();
  writeln("[Releases on <info>{$hostname}</info>]");

  $releases = $current = null;
  if (test("[ -d {{deploy_path}}/releases ]")) {
    $releases = explode("\n", run("ls -A {{deploy_path}}/releases"));
  }

  if (test("[ -h {{deploy_path}}/current ]")) {
    $current = preg_replace('/^releases\//', '', run("readlink {{deploy_path}}/current"));
  }

  if (empty($releases)) {
    writeln("<comment>  You don't have any releases yet.</comment>");
  } else {
    foreach($releases as $rel) {
      $last_modified = substr(
        run("stat -c '%y' {{deploy_path}}/releases/{$rel}"),
        0, 19);
      $branch = run("git --git-dir={{deploy_path}}/releases/{$rel}/.git branch --contains");

      if (!empty($current) && strncmp($current, $rel, strlen($rel)) == 0) {
          writeln("<comment>* $rel ($last_modified) $branch</comment>");
      } else {
          writeln("  $rel ($last_modified) $branch");
      }
    }
    if (empty($current)) {
      writeln("<comment>  (You don't have current release. Latest release is not complete.)</comment>");
    }
  }
  writeln(''); // blank line for separation.
});
