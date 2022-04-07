<p>【利用手順】</p>
<p>1: csv.zipを解凍して、その中身を「storage\app\public」直下に配置してください</p>
<br>
<p>2: 以下のファイルを開き、キーがSeasonの値に取得したい年数を設定します</p>
   <p>(※注意)年数は2012年以降しか設定出来ません</p>
   <p>【ファイル】: ~\config\const.php</p>
<br>
<p>3: 以下の順番でコマンドを実行してください</p>
   <p>・php artisan scrape:rosters</p>
   <p>・php artisan csv:import</p>
   <p>・php artisan scrape:starters</p>
   <p>・php artisan make:tf</p>
<br>
<p>4: コマンドが正常に完了して、データが無事に登録されればOKです</p>
   <p>あとはご自身の取得したい年数を設定して1~4のコマンドを繰り返し実行してください</p>