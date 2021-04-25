<?php
/* (c) Anton Medvedev <anton@medv.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deployer;

desc('Rollback to previous release');
task('admin:rollback', function () {
    $releases = get('releases_list');

    if (isset($releases[1])) {
        $releaseDir = "{{deploy_path}}/releases/{$releases[1]}";

        // Symlink to old release.
        //!!PATCH!! サブディレクトリ {{project_root}} にシンボリックリンクを作成するようにする
        run("cd {{deploy_path}} && {{bin/symlink}} $releaseDir/{{project_root}} current");
        $current = run('readlink {{deploy_path}}/current');
        run("cp -r {{deploy_path}}/{$current} {{deploy_path}}/{$current}-admin");
        run("{{bin/symlink}} {{deploy_path}}/{$current}-admin {{deploy_path}}/current_admin");

        // Remove release
        run("rm -rf {{deploy_path}}/releases/{$releases[0]}");
        run("rm -rf {{deploy_path}}/releases/{$releases[0]}-admin");

        if (isVerbose()) {
            writeln("Rollback to `{$releases[1]}` release was successful.");
        }
    } else {
        writeln("<comment>No more releases you can revert to.</comment>");
    }
});
