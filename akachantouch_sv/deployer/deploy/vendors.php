<?php
/* (c) Anton Medvedev <anton@medv.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Deployer;

desc('Installing vendors');
task('deploy1:vendors', function () {
    if (!commandExist('unzip')) {
        writeln('<comment>To speed up composer installation setup "unzip" command with PHP zip extension https://goo.gl/sxzFcD</comment>');
    }
        //!!PATCH!! サブディレクトリ {{project_root}} で composer を実行する
        run('cd {{release_path}}/{{project_root}} && {{bin/composer}} {{composer_options}}');
});
