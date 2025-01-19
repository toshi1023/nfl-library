<?php

namespace App\Console\Commands;

use App\Models\Team;
use Illuminate\Console\Command;

class UpdateTeamLogos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:logos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update for team logo path';

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
        $jsonDataList = file_get_contents(storage_path('app/data/team.json'));
        $teamDataList = json_decode($jsonDataList, true);
        foreach($teamDataList as $teamData) {
            $team = Team::find($teamData['id']);
            $team->fill([
                'image_file' => $teamData['image_file']
            ])->save();
            $this->warn('update logo team: '.$teamData['name']);
        }
    }
}
