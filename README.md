【利用手順】
1: csv.zipを解凍して、その中身を「storage\app\public」直下に配置してください

2: 以下のファイルを開き、$seasonの変数に取得したい年数を設定します
   (※注意)必ず全ファイルの年数を統一してください
   (※注意)年数は2012年以降しか設定出来ません
   ・ScrapeRosters.php
   ・CsvImport.php
   ・ScrapeStarters.php
   ・MakeTf.php

3: 以下の順番でコマンドを実行してください
   ・php artisan scrape:rosters
   ・php artisan csv:import
   ・php artisan scrape:starters
   ・php artisan make:tf

4: コマンドが正常に完了して、データが無事に登録されればOKです
   あとはご自身の取得したい年数を設定して1~4のコマンドを繰り返し実行してください