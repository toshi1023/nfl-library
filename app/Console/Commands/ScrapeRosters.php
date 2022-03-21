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
        // Startersのポジションを取得
        $crawler = \Goutte::request('GET', 'https://www.pro-football-reference.com/teams/sfo/2020_roster.htm');
        $crawler->filter('#starters .full_table > th')->each(function ($node) {
            dump($node->text());
        });
    }
}
