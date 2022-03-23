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
     * NFLのロスター情報を指定したwebページからスクレイピングする
     *
     * @return int
     */
    public function handle()
    {
        $season = 2020;
        $teams = config('const.UrlTeams');
        $data = [];

        foreach($teams as $val) {
            // スクレイピングの設定
            $crawler = \Goutte::request('GET', 'https://www.pro-football-reference.com/teams/'.$val.'/'.$season.'_roster.htm');

            // rosterの選手名/ポジション/生年月日を取得
            $lastnamelist = [];
            $firstnamelist = [];
            $positions = [];
            $birthdaylist = [];
            $a = $crawler->filter('#all_roster .is_setup #roster table tbody th')->eq(0);
            dump($a);
            $crawler->filter('#roster')->eq(0)->filter('tbody td')->each(function ($node) use(&$firstnamelist, &$lastnamelist) {
                dump($firstnamelist);
                // 選手名
                if(!is_null($node->attr('data-stat')) && $node->attr('data-stat') === 'player' && !is_null($node->attr('csk'))) {
                    $lastnamelist[] = explode(',', $node->attr('csk'))[0];
                    $firstnamelist[] = explode(',', $node->attr('csk'))[1];
                }
                // // ポジション
                // if(!is_null($node->attr('data-stat')) && $node->attr('data-stat') === 'pos'){
                //     $positions[] = $node->text();
                // }
                // // 生年月日
                // if(!is_null($node->attr('data-stat')) && $node->attr('data-stat') === 'birth_date_mod' && !is_null($node->attr('csk'))){
                //     $birthdaylist[] = $node->attr('csk');
                // }
            });

            // foreach($firstnamelist as $val) {
            //     dump($val);
            // }

            // rosterの生年月日を取得
            // $crawler->filter('#roster td')->each(function($node) use (&$birthdaylist) {
            //     if(!is_null($node->attr('data-stat')) && $node->attr('data-stat') === 'birth_date_mod'){
            //        $birthdaylist[] = $node->attr('csk');
            //     }
            // });

            // foreach($firstnamelist as $name) {
            //     dump($val.' : '.$name);
            // }
            
            $data[$val]['position'] = $positions;
            $data[$val]['firstname'] = $firstnamelist;
            $data[$val]['lastname'] = $lastnamelist;
            $data[$val]['birthday'] = $birthdaylist;
        }

        // foreach($data['firstname'] as $val) {
        //     dump($val);
        // }

        // foreach($teams as $team) {
        //     // for($i = 0; $i < count($data[$team]['firstname']); $i++) {
        //     //     // 例) sfo : FB , Kyle Juszczyk
        //     //     dump($team.' : '.$data[$team]['position'][$i].' , '.$data[$team]['firstname'][$i].' '.$data[$team]['lastname'][$i].' , '.$data[$team]['birthday'][$i]);
        //     // }
        //     foreach($data[$team]['firstname'] as $val) {
        //         dump($val);
        //     }
        // }
    }
}
