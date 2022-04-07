<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Starter;
use App\Models\TfRelation;

class MakeTf extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:tf';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the formations of selected season';

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
        try {
            $season = 2012;
            $teams = config('const.UrlTeams');

            if($season < 2012) throw new Exception('The value is invalid. Please set the value above 2012.');
    
            // Model設定
            $starterModel = new Starter();
            $tfModel = new TfRelation();
    
            $team_id = 1;
            foreach($teams as $team) {
                // starters, rosters, positionsテーブルの情報を取得
                $subdata = $starterModel->leftJoin('rosters', 'rosters.id', '=', 'starters.roster_id')
                                     ->leftJoin('positions', 'positions.id', '=', 'rosters.position_id')
                                     ->where('starters.season', $season)->where('rosters.team_id', $team_id)
                                     ->select('rosters.team_id', 'rosters.position_id', 'positions.name', 'positions.category')
                                     ->get();
                
                // offence
                $hb = 0;
                $fb = 0;
                $wr = 0;
                $te = 0;
                // defence
                $dl = 0;
                $lb = 0;
                
                foreach($subdata as $val) {
                    dump($team.'('.$val->team_id.') : '.$val->name.'('.$val->category.')');
                    switch($val->category) {
                        case 2:
                            $hb += 1;
                            break;
                        case 3:
                            $fb += 1;
                            break;
                        case 4:
                            $wr += 1;
                            break;
                        case 5:
                            $te += 1;
                            break;
                        case 11:
                        case 12:
                        case 13:
                        case 14:
                        case 15:
                            $dl += 1;
                            break;
                        case 16:
                        case 17:
                        case 18:
                            $lb += 1;
                            break;
                        default:
                            break;
                    }
                }

                // フォーメーション設定
                // offence
                $formation_id = 0;
                if($fb === 1 && $hb === 2 && $wr === 0 && $te === 2) $formation_id = 1;
                if($fb === 1 && $hb === 1 && $wr >= 2 && $te === 1) $formation_id = 2;
                if($fb === 0 && $hb === 1 && $wr >= 3 && $te === 1) $formation_id = 3;
                if($fb === 0 && $hb === 1 && $wr >= 4 && $te === 0) $formation_id = 4;
                if($fb === 1 && $hb === 2 && $wr === 0 && $te === 2) $formation_id = 8;
                if($fb === 1 && $hb === 0 && $wr >= 4 && $te === 0) $formation_id = 9;
                if($fb === 0 && $hb === 1 && $wr >= 2 && $te === 2) $formation_id = 10;
                if($fb === 0 && $hb === 0 && $wr >= 5 && $te === 0) $formation_id = 12;
                if($fb === 0 && $hb === 2 && $wr >= 2 && $te === 1) $formation_id = 15;
                if($formation_id === 0) $formation_id = 3;

                $exists = $tfModel->leftJoin('formations', 'formations.id', '=', 'tf_relations.formation_id')
                                  ->where('tf_relations.season', $season)->where('tf_relations.team_id', $team_id)->where('formations.odflg', 1)
                                  ->exists();

                if(!$exists) {
                    TfRelation::create([
                        'season'        => $season,
                        'team_id'       => $team_id,
                        'formation_id'  => $formation_id
                    ]);
                }

                // 例) 2020 sfo (offence) : 3
                dump($season.' '.$team.' (offence) : '.'fb: '.$fb.', hb:'.$hb.', wr:'.$wr.', te:'.$te.', formation:'.$formation_id);

                // defence
                $formation_id = 0;
                if($dl === 3 && $lb === 4) $formation_id = 50;
                if($dl === 4 && $lb === 3) $formation_id = 51;
                if($dl === 4 && $lb === 4) $formation_id = 52;
                if($dl === 5 && $lb === 2) $formation_id = 53;
                if($formation_id === 0) $formation_id = 51;

                $exists = $tfModel->leftJoin('formations', 'formations.id', '=', 'tf_relations.formation_id')
                                  ->where('tf_relations.season', $season)->where('tf_relations.team_id', $team_id)->where('formations.odflg', 0)
                                  ->exists();

                if(!$exists) {
                    TfRelation::create([
                        'season'        => $season,
                        'team_id'       => $team_id,
                        'formation_id'  => $formation_id
                    ]);
                }
    
                // 例) 2020 sfo (defence) : 15
                dump($season.' '.$team.' (defence) : '.'dl: '.$dl.', lb:'.$lb.', formation:'.$formation_id);
                // dump($season.' '.$team.' (defence) : '.'dl: '.$dl.', lb:'.$lb);
                // dump($season.' '.$team.' (defence) : '.'formation_id: '.$formation_id);

                // team_idを更新
                $team_id += 1;
            }
        } catch(Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
