<?php
namespace Deployer;

require 'recipe/laravel.php';
require 'deployer/loader.php';

// Project name
set('application', 'akachan');

// Project repository
set('repository', 'git@bitbucket.org:friijp/akachantouch_sv.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
set('shared_files', ['.env']);
set('shared_dirs', ['storage','public/vendor']);
set('writable_dirs', ['storage', 'vendor']);
set('ssh_multiplexing', false);

// Writable dirs by web server 
set('allow_anonymous_stats', false);

inventory(dirname(__FILE__).'/hosts.yml');

task('permissions:reset', function () {
    run('cd {{deploy_path}}');
    run('sudo chown -R {{user}}:{{group}} {{deploy_path}}');
    run('sudo find {{deploy_path}}/ -type f -exec chmod 644 {} \;');
    run('sudo find {{deploy_path}}/ -type d -exec chmod 755 {} \;');

//    run('sudo chmod 775 {{deploy_path}}/shared');
    run('sudo chmod -R 777 {{deploy_path}}/shared/storage');
//    run('sudo chmod -R 775 {{deploy_path}}/shared/public');

    run('cd {{release_path}}');
    run('sudo chmod -R 775 {{release_path}}/vendor');
})->desc('Fix permissions');

task('fix_vendor:cp', function() {
    run('cp /var/www/html/shared/Model.php /var/www/html/current/vendor/encore/laravel-admin/src/Grid');
})->desc('Fix Model.php in laravel-admin vendor ');

task('deploy:admin', function () {
    if (test("[ -h {{deploy_path}}/current_admin ]")) {
        $current = run('readlink {{deploy_path}}/current_admin');
        run("rm -rf {{deploy_path}}/$current");
    }
    if (test("[ -h {{deploy_path}}/current ]")) {
        $current = run('readlink {{deploy_path}}/current');
        run("cp -r {{deploy_path}}/{$current} {{deploy_path}}/{$current}-admin");
        run("{{bin/symlink}} {{deploy_path}}/{$current}-admin {{deploy_path}}/current_admin");
        run("cd {{deploy_path}}/current_admin && {{bin/symlink}} ../../shared/admin/.env .env");
        run("cp -r {{deploy_path}}/shared/routes/web.php {{deploy_path}}/current_admin/routes");
        run("cd {{deploy_path}}/current_admin && php artisan config:cache");
    }
});

// Tasks

task('deploy', [
    'deploy:confirm',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:admin',
    'deploy:unlock',
    'fix_vendor:cp',
    'cleanup', 
    'success',
]);

task('deploy_web2', [
    'deploy:confirm',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'fix_vendor:cp',
    'cleanup',
    'success',
]);

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');

