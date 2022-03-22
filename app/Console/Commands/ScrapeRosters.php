<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;


class ScrapeRosters extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:rosters';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'scrapping nfl rosters';

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
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $season = 2020;
        $teams = config('const.UrlTeams');
        $data = [];

        foreach($teams as $val) {
            // Startersのポジションを取得
            $crawler = \Goutte::request('GET', 'https://www.pro-football-reference.com/teams/'.$val.'/'.$season.'_roster.htm');
            $positions = $crawler->filter('#starters .full_table > th')->each(function ($node) {
                // Startersに記載されている全ポジションを$postionsに格納
                return $node->text();
            });

            $lastnamelist = [];
            $firstnamelist = [];
            $crawler->filter('#starters .full_table > td')->each(function ($node) use(&$firstnamelist, &$lastnamelist) {
                // Startersに記載されている全選手の名前を$namelistに格納
                if(!is_null($node->attr('csk')) && $node->attr('data-stat') === 'player') {
                    // 選手名を取得して$namelistに追加する
                    $lastnamelist[] = explode(',', $node->attr('csk'))[0];
                    $firstnamelist[] = explode(',', $node->attr('csk'))[1];
                }
            });

            // foreach($firstnamelist as $name) {
            //     dump($val.' : '.$name);
            // }
            
            $data[$val]['position'] = $positions;
            $data[$val]['firstname'] = $firstnamelist;
            $data[$val]['lastname'] = $lastnamelist;
        }

        foreach($teams as $team) {
            for($i = 0; $i < count($data[$team]['firstname']); $i++) {
                // 例) sfo : FB , Kyle Juszczyk
                dump($team.' : '.$data[$team]['position'][$i].' , '.$data[$team]['firstname'][$i].' '.$data[$team]['lastname'][$i]);
            }
        }

        // Startersのポジションを取得
        // $crawler = \Goutte::request('GET', 'https://www.pro-football-reference.com/teams/sfo/2020_roster.htm');
        // $crawler->filter('#starters .full_table > th')->each(function ($node) {
        //     dump($node->text());
        // });
    }
}
