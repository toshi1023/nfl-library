<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Roster;
use App\Models\Starter;
use App\Models\Position;
use Illuminate\Support\Facades\Log;
use Exception;

class ScrapeStarters extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:starters {season?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'scrapping nfl starters';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * NFLのスターター情報を指定したwebページからスクレイピングする
     *
     * @return int
     */
    public function handle()
    {
        try {
            $season = config('const.Season');
            if(!is_null($this->argument('season'))) $season = $this->argument('season');
            $teams = config('const.UrlTeams');
            $data = [];

            if($season < 2012) throw new Exception('The value is invalid. Please set the value above 2012.');
    
            // Model設定
            $rosterModel = new Roster();
    
            $team_id = 1;
            foreach($teams as $val) {
                // スクレイピングの設定
                $crawler = \Goutte::request('GET', 'https://www.pro-football-reference.com/teams/'.$val.'/'.$season.'_roster.htm');
    
                // startersのポジションを取得
                $positions = $crawler->filter('#starters .full_table > th')->each(function ($node) {
                    // startersに記載されている全ポジションを$postionsに格納
                    return $node->text();
                });
    
                // startersの選手名を取得
                $lastnamelist = [];
                $firstnamelist = [];
                $crawler->filter('#starters .full_table > td')->each(function ($node) use(&$firstnamelist, &$lastnamelist) {
                    // startersに記載されている全選手の名前を$namelistに格納
                    if(!is_null($node->attr('csk')) && $node->attr('data-stat') === 'player') {
                        // 選手名を取得して$namelistに追加する
                        $lastnamelist[] = explode(',', $node->attr('csk'))[0];
                        $firstnamelist[] = explode(',', $node->attr('csk'))[1];
                    }
                });
                
                $data[$val]['position'] = $positions;
                $data[$val]['firstname'] = $firstnamelist;
                $data[$val]['lastname'] = $lastnamelist;
                $data[$val]['team_id'] = $team_id;
    
                // team_idを更新
                $team_id += 1;
            }
    
            $team_id = 1;
            foreach($teams as $team) {
                for($i = 0; $i < count($data[$team]['firstname']); $i++) {
                    // rostersテーブルの情報を取得
                    $roster = $rosterModel->leftJoin('players', 'players.id', '=', 'rosters.player_id')
                                      ->where('rosters.season', $season)->where('rosters.team_id', $team_id)
                                      ->where('players.firstname', $data[$team]['firstname'][$i])->where('players.lastname', $data[$team]['lastname'][$i])
                                      ->select('rosters.*')
                                      ->first();

                    $position_model = Position::where('name', $data[$team]['position'][$i])->first();

                    // startersテーブルに新規保存
                    if(!Starter::where('roster_id', $roster->id)->exists()) {
                        Starter::create([
                            'season'        => $season,
                            'odflg'         => !is_null($position_model) && $position_model->category < 11 ? true : false,
                            'roster_id'     => $roster->id
                        ]);
                    }

                    // 例) sfo : FB , Kyle Juszczyk
                    dump($team.' : '.$data[$team]['position'][$i].' , '.$data[$team]['firstname'][$i].' '.$data[$team]['lastname'][$i]);
                }
                // team_idを更新
                $team_id += 1;
            }

            $this->info('');
            $this->info('Scrape Starters All Successfully.');
        } catch(Exception $e) {
            Log::error($e->getMessage());
            // stack traceをLogに出力
            $index = 1;
            foreach($e->getTrace() as $val) {
                // 例) StackTrace[1] :: /home/test/app/Http/Controllers/TestController.php 22行目, { class: Test , function: test }
                $trace = 'StackTrace['.$index.'] :: '.$val["file"].' '.$val["line"].'行目 , { class: '.$val["class"].' , function: '.$val["function"].' }';
                Log::error($trace);
    
                $index += 1;
            }
            $this->info('');
            $this->error($e->getMessage());
        }
    }
}
