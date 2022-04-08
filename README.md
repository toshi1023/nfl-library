<p>【利用手順】</p>
<p>1: csv.zipを解凍して、その中身を「storage\app\public」直下に配置してください</p>
<br>
<p>2: 以下のコマンドでDBの初期設定を行います</p>
   <p>・php artisan migrate:fresh --seed</p>
<br>
<p>3: 以下の順番でコマンドを実行してください</p>
   <p>※引数は任意です</p>
   <p>(※注意)年数は2012年以降しか設定出来ません</p>
   <p>・php artisan scrape:rosters {西暦年}</p>
   <p>・php artisan csv:import {西暦年}</p>
   <p>・php artisan scrape:starters {西暦年}</p>
   <p>・php artisan make:tf {西暦年}</p>
<br>
<p>(3の補足) コマンドに引数を渡すか、もしくはconfigフォルダ内の設定ファイルを開き、キーがSeasonの値に取得したい年数を西暦で設定します</p>
   <p>【コマンド】: php artisan scrape:rosters 2012</p>
   <p>【ファイル】: ~\config\const.php</p>
<br>
<p>4: コマンドが正常に完了して、データが無事に登録されればOKです</p>
   <p>あとはご自身の取得したい年数を設定して3~4の手順を繰り返し実行してください</p>