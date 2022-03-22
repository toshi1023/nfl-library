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
                // dump($node->text());
            });

            $data[$val] = $positions;
        }

        foreach($data as $team => $array) {
            foreach($array as $val) {
                // 例) buf : QB
                dump($team.' : '.$val);
            }
        }

        // Startersのポジションを取得
        // $crawler = \Goutte::request('GET', 'https://www.pro-football-reference.com/teams/sfo/2020_roster.htm');
        // $crawler->filter('#starters .full_table > th')->each(function ($node) {
        //     dump($node->text());
        // });
    }
}
