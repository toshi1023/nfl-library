<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Models\Starter;
use App\Models\TfRelation;

class MakeTf extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:tf {season?}';

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
            $season = config('const.Season');
            if(!is_null($this->argument('season'))) $season = $this->argument('season');
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
                $qb = 0;
                $hb = 0;
                $fb = 0;
                $wr = 0;
                $te = 0;
                $rg = 0;
                $lg = 0;
                $rot = 0;
                $lot = 0;
                $c = 0;

                $acrb = 0;
                $acwr = 0;
                $acte = 0;
                $acol = 0;

                // defence
                $rdt = 0;
                $ldt = 0;
                $nt = 0;
                $rde = 0;
                $lde = 0;
                $mlb = 0;
                $lolb = 0;
                $rolb = 0;
                $lcb = 0;
                $rcb = 0;
                $ss = 0;
                $fs = 0;

                $acdl = 0;
                $aclb = 0;
                $acdb = 0;

                // (dump出力時用に使用)
                $dl = 0;
                $lb = 0;
                
                foreach($subdata as $val) {
                    dump($team.'('.$val->team_id.') : '.$val->name.'('.$val->category.')');
                    switch($val->category) {
                        case 1:
                            $qb += 1;
                            break;
                        case 2:
                            $hb += 1;
                            $acrb += 1;
                            break;
                        case 3:
                            $fb += 1;
                            $acrb += 1;
                            break;
                        case 4:
                            $wr += 1;
                            $acwr += 1;
                            break;
                        case 5:
                            $te += 1;
                            $acte += 1;
                            break;
                        case 6:
                            $rg += 1;
                            $acol += 1;
                            break;
                        case 7:
                            $lg += 1;
                            $acol += 1;
                            break;
                        case 8:
                            $rot += 1;
                            $acol += 1;
                            break;
                        case 9:
                            $lot += 1;
                            $acol += 1;
                            break;
                        case 10:
                            $c += 1;
                            $acol += 1;
                            break;
                        case 11:
                            $rdt += 1;
                            $dl += 1;
                            $acdl += 1;
                            break;
                        case 12:
                            $ldt += 1;
                            $dl += 1;
                            $acdl += 1;
                            break;
                        case 13:
                            $nt += 1;
                            $dl += 1;
                            $acdl += 1;
                            break;
                        case 14:
                            $rde += 1;
                            $dl += 1;
                            $acdl += 1;
                            break;
                        case 15:
                            $lde += 1;
                            $dl += 1;
                            $acdl += 1;
                            break;
                        case 16:
                            $mlb += 1;
                            $lb += 1;
                            $aclb += 1;
                            break;
                        case 17:
                            $rolb += 1;
                            $lb += 1;
                            $aclb += 1;
                            break;
                        case 18:
                            $lolb += 1;
                            $lb += 1;
                            $aclb += 1;
                            break;
                        case 19:
                            $rcb += 1;
                            $acdb += 1;
                            break;
                        case 20:
                            $lcb += 1;
                            $acdb += 1;
                            break;
                        case 21:
                            $ss += 1;
                            $acdb += 1;
                            break;
                        case 22:
                            $fs += 1;
                            $acdb += 1;
                            break;
                        default:
                            break;
                    }
                }

                // フォーメーション設定
                // offence
                $abstractflg = false;
                $formation_id = 0;
                if($qb === 1 && $fb === 1 && $hb === 2 && $wr === 0 && $te === 2 && $rg === 1 && $lg === 1 && $rot === 1 && $lot === 1 && $c === 1) $formation_id = config('const.Formationid.T');
                if($qb === 1 && $fb === 1 && $hb === 1 && $wr >= 2 && $te === 1 && $rg === 1 && $lg === 1 && $rot === 1 && $lot === 1 && $c === 1) $formation_id = config('const.Formationid.I');
                if($qb === 1 && $fb === 0 && $hb === 1 && $wr >= 3 && $te === 1 && $rg === 1 && $lg === 1 && $rot === 1 && $lot === 1 && $c === 1) $formation_id = config('const.Formationid.SSB');
                if($qb === 1 && $fb === 0 && $hb === 1 && $wr >= 4 && $te === 0 && $rg === 1 && $lg === 1 && $rot === 1 && $lot === 1 && $c === 1) $formation_id = config('const.Formationid.SF');
                if($qb === 1 && $fb === 1 && $hb === 2 && $wr === 0 && $te === 2 && $rg === 1 && $lg === 1 && $rot === 1 && $lot === 1 && $c === 1) $formation_id = config('const.Formationid.WB');
                if($qb === 1 && $fb === 1 && $hb === 0 && $wr >= 4 && $te === 0 && $rg === 1 && $lg === 1 && $rot === 1 && $lot === 1 && $c === 1) $formation_id = config('const.Formationid.FBW4');
                if($qb === 1 && $fb === 0 && $hb === 1 && $wr >= 2 && $te === 2 && $rg === 1 && $lg === 1 && $rot === 1 && $lot === 1 && $c === 1) $formation_id = config('const.Formationid.FBWT');
                if($qb === 1 && $fb === 0 && $hb === 0 && $wr >= 5 && $te === 0 && $rg === 1 && $lg === 1 && $rot === 1 && $lot === 1 && $c === 1) $formation_id = config('const.Formationid.EB');
                if($qb === 1 && $fb === 0 && $hb === 2 && $wr >= 2 && $te === 1 && $rg === 1 && $lg === 1 && $rot === 1 && $lot === 1 && $c === 1) $formation_id = config('const.Formationid.PSHH');
                if($formation_id === 0) {
                    // ショットガン
                    if($acrb === 1 && $acwr >= 3 && $acte === 1 && $acol >= 5) {
                        $formation_id = config('const.Formationid.SG');
                        $abstractflg = true;
                    }
                    // フレックスボーン(WRが2人・TEが2人バージョン)
                    if($acrb === 1 && $acwr >= 2 && $acte === 2 && $acol >= 5) {
                        $formation_id = config('const.Formationid.PSHH');
                        $abstractflg = true;
                    }
                    // Tフォーメーション
                    if($acrb >= 3 && $acwr === 0 && $acte >= 2 && $acol >= 5) {
                        $formation_id = config('const.Formationid.T');
                        $abstractflg = true;
                    }
                    // スプレッドフォーメーション
                    if($acrb >= 1 && $acwr >= 4 && $acte === 0 && $acol >= 5) {
                        $formation_id = config('const.Formationid.SF');
                        $abstractflg = true;
                    }
                    // プロセット(スプリットバック) HB & HB
                    if($acrb >= 2 && $acwr >= 2 && $acte === 1 && $acol >= 5) {
                        $formation_id = config('const.Formationid.PSHH');
                        $abstractflg = true;
                    }

                    // 何も当てはまら無かった場合はシングルバック
                    if(!$abstractflg) {
                        $formation_id = config('const.Formationid.SSB');
                        $abstractflg = true;
                    }
                }

                $exists = $tfModel->leftJoin('formations', 'formations.id', '=', 'tf_relations.formation_id')
                                  ->where('tf_relations.season', $season)->where('tf_relations.team_id', $team_id)->where('formations.odflg', 1)
                                  ->exists();

                if(!$exists) {
                    TfRelation::create([
                        'season'        => $season,
                        'team_id'       => $team_id,
                        'formation_id'  => $formation_id,
                        'abstract_flg'  => $abstractflg
                    ]);
                }

                $str_abstractflg = $abstractflg ? 'true' : 'false';
                if($abstractflg) {
                    // 例) 【abstract_flg: true】 2020 sfo (offence) : fb: 1, hb: 1, wr: 2, te: 1, formation: 2
                    dump('【abstract_flg: '.$str_abstractflg.'】'.$season.' '.$team.' (offence) : '.'acrb: '.$acrb.', acwr:'.$acwr.', acte:'.$acte.', ol:'.$acol.', formation:'.$formation_id);
                } else {
                    // 例) 【abstract_flg: false】2020 sfo (offence) : fb: 1, hb: 1, wr: 2, te: 1, formation: 2
                    dump('【abstract_flg: '.$str_abstractflg.'】'.$season.' '.$team.' (offence) : '.'fb: '.$fb.', hb:'.$hb.', wr:'.$wr.', te:'.$te.', formation:'.$formation_id);
                }

                // defence
                $abstractflg = false;
                $formation_id = 0;
                if($rde === 1 && $lde === 1 && $nt === 1 && $rolb === 1 && $mlb === 2 && $lolb === 1 && $rcb === 1 && $lcb === 1 && $ss === 1 && $fs === 1) $formation_id = config('const.Formationid.3-4');
                if($rdt === 1 && $ldt === 1 && $rde === 1 && $lde === 1 && $rolb === 1 && $mlb === 1 && $lolb === 1 && $rcb === 1 && $lcb === 1 && $ss === 1 && $fs === 1) $formation_id = config('const.Formationid.4-3');
                if($rdt === 1 && $ldt === 1 && $rde === 1 && $lde === 1 && $rolb === 1 && $mlb === 2 && $lolb === 1 && $rcb === 1 && $lcb === 1 && $ss === 1) $formation_id = config('const.Formationid.4-4');
                if($rdt === 1 && $ldt === 1 && $rde === 1 && $lde === 1 && $nt === 1 && $mlb === 2 && $rcb === 1 && $lcb === 1 && $ss === 1 && $fs === 1) $formation_id = config('const.Formationid.5-2');
                if($rdt === 1 && $ldt === 1 && $rde === 1 && $lde === 1 && $rolb === 1 && $lolb === 1 && $rcb === 1 && $lcb === 2 && $ss === 1 && $fs === 1) $formation_id = config('const.Formationid.Nickel_LCB');
                if($rdt === 1 && $ldt === 1 && $rde === 1 && $lde === 1 && $rolb === 1 && $lolb === 1 && $rcb === 2 && $lcb === 1 && $ss === 1 && $fs === 1) $formation_id = config('const.Formationid.Nickel_RCB');
                if($rdt === 1 && $ldt === 1 && $rde === 1 && $lde === 1 && $mlb === 1 && $rcb === 2 && $lcb === 2 && $ss === 1 && $fs === 1) $formation_id = config('const.Formationid.Dime');
                if($rdt === 0 && $ldt === 0 && $nt === 1 && $rde === 0 && $lde === 0 && $mlb === 2 && $rolb === 2 && $lolb === 2 && $rcb === 2 && $lcb === 2 && $ss === 1 && $fs === 1) $formation_id = config('const.Formationid.1-6-4');
                if($rdt === 1 && $ldt === 1 && $nt === 0 && $rde === 0 && $lde === 0 && $mlb === 2 && $rolb === 1 && $lolb === 1 && $rcb === 1 && $lcb === 1 && $ss === 2 && $fs === 1) $formation_id = config('const.Formationid.2-4-5');
                if($rdt === 0 && $ldt === 0 && $nt === 1 && $rde === 1 && $lde === 1 && $mlb === 3 && $rolb === 2 && $lolb === 2 && $rcb === 0 && $lcb === 0 && $ss === 1 && $fs === 0) $formation_id = config('const.Formationid.3-7-1');
                if($rdt === 0 && $ldt === 0 && $nt === 1 && $rde === 1 && $lde === 1 && $mlb === 2 && $rolb === 2 && $lolb === 2 && $rcb === 0 && $lcb === 0 && $ss === 1 && $fs === 1) $formation_id = config('const.Formationid.3-6-2');
                if($rdt === 1 && $ldt === 1 && $nt === 0 && $rde === 1 && $lde === 1 && $mlb === 2 && $rolb === 2 && $lolb === 2 && $rcb === 0 && $lcb === 0 && $ss === 1 && $fs === 0) $formation_id = config('const.Formationid.4-6-1');
                if($rdt === 1 && $ldt === 1 && $nt === 0 && $rde === 1 && $lde === 1 && $mlb === 1 && $rolb === 2 && $lolb === 2 && $rcb === 0 && $lcb === 0 && $ss === 1 && $fs === 1) $formation_id = config('const.Formationid.4-5-2');
                if($rdt === 1 && $ldt === 1 && $nt === 1 && $rde === 1 && $lde === 1 && $mlb === 1 && $rolb === 2 && $lolb === 2 && $rcb === 0 && $lcb === 0 && $ss === 1 && $fs === 0) $formation_id = config('const.Formationid.5-5-1');
                if($rdt === 1 && $ldt === 1 && $nt === 1 && $rde === 1 && $lde === 1 && $mlb === 2 && $rolb === 1 && $lolb === 1 && $rcb === 0 && $lcb === 0 && $ss === 1 && $fs === 1) $formation_id = config('const.Formationid.5-4-2');
                if($rdt === 2 && $ldt === 2 && $nt === 0 && $rde === 1 && $lde === 1 && $mlb === 2 && $rolb === 1 && $lolb === 1 && $rcb === 0 && $lcb === 0 && $ss === 1 && $fs === 0) $formation_id = config('const.Formationid.6-4-1');
                if($rdt === 2 && $ldt === 2 && $nt === 0 && $rde === 1 && $lde === 1 && $mlb === 1 && $rolb === 1 && $lolb === 1 && $rcb === 0 && $lcb === 0 && $ss === 1 && $fs === 1) $formation_id = config('const.Formationid.6-3-2');
                if($formation_id === 0) {
                    // 3-4
                    if($acdl === 3 && $aclb >= 4 && $acdb >= 4) {
                        $formation_id = config('const.Formationid.3-4');
                        $abstractflg = true;
                    }
                    // 4-4
                    if($acdl === 4 && $aclb >= 4 && $acdb >= 3) {
                        $formation_id = config('const.Formationid.4-4');
                        $abstractflg = true;
                    }
                    // Nickel
                    if($acdl === 4 && $aclb === 2 && $acdb >= 5) {
                        $formation_id = config('const.Formationid.Nickel_LCB');
                        $abstractflg = true;
                    }
                    // 46
                    if($acdl >= 6 && $aclb === 1 && $acdb >= 4) {
                        $formation_id = config('const.Formationid.46');
                        $abstractflg = true;
                    }
                    // Dime
                    if($acdl >= 4 && $aclb === 1 && $acdb >= 5 && !$abstractflg) {
                        $formation_id = config('const.Formationid.Dime');
                        $abstractflg = true;
                    }
                    // 5-2
                    if($acdl >= 5 && $aclb >= 2 && $acdb >= 4 && !$abstractflg) {
                        $formation_id = config('const.Formationid.5-2');
                        $abstractflg = true;
                    }
                    // 1-6-4
                    if($acdl === 1 && $aclb >= 6 && $acdb >= 4) {
                        $formation_id = config('const.Formationid.1-6-4');
                        $abstractflg = true;
                    }
                    // 2-4-5
                    if($acdl === 2 && $aclb >= 4 && $acdb >= 4) {
                        $formation_id = config('const.Formationid.2-4-5');
                        $abstractflg = true;
                    }
                    // 3-7-1
                    if($acdl === 3 && $aclb >= 6 && $acdb === 1) {
                        $formation_id = config('const.Formationid.3-7-1');
                        $abstractflg = true;
                    }
                    // 3-6-2
                    if($acdl === 3 && $aclb >= 6 && $acdb === 2) {
                        $formation_id = config('const.Formationid.3-6-2');
                        $abstractflg = true;
                    }
                    // 4-6-1
                    if($acdl === 4 && $aclb >= 6 && $acdb === 1) {
                        $formation_id = config('const.Formationid.4-6-1');
                        $abstractflg = true;
                    }
                    // 4-5-2
                    if($acdl === 4 && $aclb >= 5 && $acdb === 2) {
                        $formation_id = config('const.Formationid.4-5-2');
                        $abstractflg = true;
                    }
                    // 5-5-1
                    if($acdl === 5 && $aclb >= 5 && $acdb === 1) {
                        $formation_id = config('const.Formationid.5-5-1');
                        $abstractflg = true;
                    }
                    // 5-4-2
                    if($acdl === 5 && $aclb >= 4 && $acdb === 2) {
                        $formation_id = config('const.Formationid.5-4-2');
                        $abstractflg = true;
                    }
                    // 6-4-1
                    if($acdl === 6 && $aclb >= 4 && $acdb === 1) {
                        $formation_id = config('const.Formationid.6-4-1');
                        $abstractflg = true;
                    }
                    // 6-3-2
                    if($acdl === 6 && $aclb >= 3 && $acdb === 2) {
                        $formation_id = config('const.Formationid.6-3-2');
                        $abstractflg = true;
                    }

                    // 何も当てはまら無かった場合は 4-3
                    if(!$abstractflg) {
                        $formation_id = config('const.Formationid.4-3');
                        $abstractflg = true;
                    }
                }

                $exists = $tfModel->leftJoin('formations', 'formations.id', '=', 'tf_relations.formation_id')
                                  ->where('tf_relations.season', $season)->where('tf_relations.team_id', $team_id)->where('formations.odflg', 0)
                                  ->exists();

                if(!$exists) {
                    TfRelation::create([
                        'season'        => $season,
                        'team_id'       => $team_id,
                        'formation_id'  => $formation_id,
                        'abstract_flg'  => $abstractflg
                    ]);
                }

                $str_abstractflg = $abstractflg ? 'true' : 'false';
                if($abstractflg) {
                    // 例) 【abstract_flg: true】 2020 sfo (defence) : acdl: 4, aclb: 3, acdb: 4, formation: 15
                    dump('【abstract_flg: '.$str_abstractflg.'】'.$season.' '.$team.' (defence) : '.'acdl: '.$acdl.', aclb:'.$aclb.', acdb:'.$acdb.', formation:'.$formation_id);
                } else {
                    // 例) abstract_flg: false】 2020 sfo (defence) : dl: 4, lb: 3, rcb: 1, lcb: 1, formation: 15
                    dump('【abstract_flg: '.$str_abstractflg.'】'.$season.' '.$team.' (defence) : '.'dl: '.$dl.', lb:'.$lb.', rcb: '.$rcb.', lcb: '.$lcb.', formation:'.$formation_id);
                }
                // dump($season.' '.$team.' (defence) : '.'dl: '.$dl.', lb:'.$lb);
                // dump($season.' '.$team.' (defence) : '.'formation_id: '.$formation_id);

                // team_idを更新
                $team_id += 1;
            }

            $this->info('');
            $this->info('Make Tf Successfully.');
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
