<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Player;
use App\Models\Roster;
use App\Models\Position;

class CsvImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'csv:import {season?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'import the infomation of madden nfl rating';

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
     * madden nfl のcsvファイルから情報を取得し、DBに格納
     *
     * @return int
     */
    public function handle()
    {
        
        $season = config('const.Season');
        if(!is_null($this->argument('season'))) $season = $this->argument('season');

        $teams = config('const.UrlTeams');

        if($season < 2012) throw new Exception('The value is invalid. Please set the value above 2012.');

        // Model設定
        $playerModel = new Player();
        $rosterModel = new Roster();
        $postionModel = new Position();

        $data = [];
        $file = null;
        foreach($teams as $val) {
            // SplFileObjectの作成
            if($season > 2015) {
                $file = new \SplFileObject(storage_path('app/public/'.$season.'/'.$val.'_madden_nfl_'.config('const.Madden.'.strval($season)).'_.csv'));
            } else {
                $file = new \SplFileObject(storage_path('app/public/'.$season.'/'.$val.'_madden_nfl_'.config('const.Madden.'.strval($season)).'.csv'));
            }

            // 読み込み設定
            $file->setFlags(
                \SplFileObject::READ_CSV |      // CSVを配列形式で読み込む
                \SplFileObject::READ_AHEAD |
                \SplFileObject::SKIP_EMPTY |    // 前の行と合わせて、空行があったら読み飛ばす
                \SplFileObject::DROP_NEW_LINE   // 改行コードは無視する
            );
            // 1行ずつ読み込んで配列に保存
            $i = 0;
            // 配列のindexを設定
            $teamIndex = null;
            $fnameIndex = null;
            $lnameIndex = null;
            $nameIndex = null;
            $posIndex = null;
            $numIndex = null;
            $ratIndex = null;
            foreach($file as $member){
                $j = 0;
                foreach($member as $col) {
                    // 条件設定
                    if($i === 0) {
                        switch($col) {
                            case 'Team':
                                $teamIndex = $j;
                                break;
                            case 'First Name':
                            case 'FIRST':
                                $fnameIndex = $j;
                                break;
                            case 'Last Name':
                            case 'LAST':
                                $lnameIndex = $j; 
                                break;
                            case 'Position':
                            case 'POSITION':
                                $posIndex = $j;
                                break;
                            case 'Jersey':
                            case 'Jersey Number':
                            case 'JERSEY':
                            case 'Jersey #':
                                $numIndex = $j;
                                break;
                            case 'Overall':
                            case 'Overall Rating':
                            case 'OVR':
                            case 'OVERALL RATING':
                                $ratIndex = $j;
                                break;
                            default:
                                // csvのデータカラムに"・First"が存在するため、ここでチェック
                                preg_match('/\bFIRST\b/', $col, $matches);
                                if($matches) {
                                    $fnameIndex = $j;
                                    break;
                                }
                                
                                // csvのデータカラムに"・First Name"が存在するため、ここでチェック
                                preg_match('/\bFirst Name\b/', $col, $matches);
                                if($matches) {
                                    $fnameIndex = $j;
                                    break;
                                }
                                
                                // csvのデータカラムに"・Name"が存在するため、ここでチェック
                                preg_match('/\bName\b/', $col, $matches);
                                if($matches) {
                                    $nameIndex = $j;
                                    break;
                                }

                                // csvのデータカラムに"・Team"が存在するため、ここでチェック
                                preg_match('/\bTeam\b/', $col, $matches);
                                if($matches) {
                                    $teamIndex = $j;
                                    break;
                                }
                        }
                        // dump('fname: '.$fnameIndex.', lname: '.$lnameIndex.', name: '.$nameIndex);
                        $j += 1;
                    }
                }
                if($i !== 0) {
                    if(!is_null($teamIndex)) $data[$val]['team'] = $member[$teamIndex];
                    if(!is_null($fnameIndex) && !is_null($lnameIndex) && is_null($nameIndex)) {
                        $data[$val]['name'][] = $member[$fnameIndex].' '.$member[$lnameIndex];
                    } else {
                        $data[$val]['name'][] = $member[$nameIndex];
                    }
                    $data[$val]['position'][] = $member[$posIndex];
                    if(!is_null($numIndex)) $data[$val]['number'][] = $member[$numIndex];
                    $data[$val]['rating'][] = $member[$ratIndex];
                }
                $i += 1;
            }
        }

        $team_id = 1;
        foreach($teams as $team) {
            for($i = 0; $i < count($data[$team]['name']); $i++) {
                $is_team = array_key_exists('team', $data[$team]);
                $is_num = array_key_exists('number', $data[$team]);
                // positionsテーブルのidを取得
                $position_id = $postionModel->where('name', $data[$team]['position'][$i])->first()->id;
                // rostersテーブルの情報を更新
                $roster = $rosterModel->leftJoin('players', 'players.id', '=', 'rosters.player_id')
                                      ->where('rosters.season', $season)->where('rosters.team_id', $team_id)
                                      ->where('players.firstname', explode(' ', $data[$team]['name'][$i])[0])->where('players.lastname', explode(' ', $data[$team]['name'][$i])[1])
                                      ->select('rosters.*')
                                      ->first();
                
                // rostersに存在しない場合はスキップ
                if(is_null($roster)) continue;
                
                $roster->position_id = $position_id;
                $roster->rating = $data[$team]['rating'][$i];

                if($is_team && $is_num) {
                    $roster->number = $data[$team]['number'][$i];
                    
                    // 例)【49ers】 No.7 QB : Colin Kaepernick - 89
                    dump(' 【'.$data[$team]['team'].'】 No.'.$data[$team]['number'][$i].' '.$data[$team]['position'][$i].' : '.$data[$team]['name'][$i].' - '.$data[$team]['rating'][$i]);
                } else if ($is_team && !$is_num) {
                    // 例)【49ers】 QB : Colin Kaepernick - 89
                    dump(' 【'.$data[$team]['team'].'】 '.$data[$team]['position'][$i].' : '.$data[$team]['name'][$i].' - '.$data[$team]['rating'][$i]);
                } else if (!$is_team && $is_num) {
                    $roster->number = $data[$team]['number'][$i];
                    // 例)No.7 QB : Colin Kaepernick - 89
                    dump('No.'.$data[$team]['number'][$i].' '.$data[$team]['position'][$i].' : '.$data[$team]['name'][$i].' - '.$data[$team]['rating'][$i]);
                } else {
                    // 例)QB : Colin Kaepernick - 89
                    dump($data[$team]['position'][$i].' : '.$data[$team]['name'][$i].' - '.$data[$team]['rating'][$i]);
                }

                // rostersテーブルのデータ変更を保存
                $roster->save();
            }
            // team_idを更新
            $team_id += 1;
        }

        $this->info('');
        $this->info('Csv Import Successfully.');
    }
}
