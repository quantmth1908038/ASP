<?php
namespace Deployer;

/**
 * Confirmation
 */
task('deploy:confirm', function () {
  writeln(<<<_EOS_
<error>【注意】</error>
開発中のブランチをデプロイする場合には、origin に push してからデプロイしてください。

_EOS_
  );

  if (!askConfirmation('デプロイを実行してもよいですか?')) {
      writeln("<comment>ユーザにより処理を中断しました。</comment>\n");
      die();
  }
})->local();
