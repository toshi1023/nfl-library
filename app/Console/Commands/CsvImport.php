<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class CsvImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'csv:import';

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
        $season = 2012;
        $teams = config('const.UrlTeams');

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
                                $fnameIndex = $j;
                                break;
                            case 'Last Name':
                                $lnameIndex = $j; 
                                break;
                            case 'Position':
                                $posIndex = $j;
                                break;
                            case 'Jersey':
                            case 'Jersey Number':
                                $numIndex = $j;
                                break;
                            case 'Overall':
                            case 'OVR':
                                $ratIndex = $j;
                                break;
                            default:
                                // csvのデータカラムに"・Name"が存在するため、ここでチェック
                                preg_match('/\bName\b/', $col, $matches);
                                if($matches) $nameIndex = $j;

                                // csvのデータカラムに"・Team"が存在するため、ここでチェック
                                preg_match('/\bTeam\b/', $col, $matches);
                                if($matches) $teamIndex = $j;

                                break;
                        }
                        $j += 1;
                    }
                }
                if(!is_null($teamIndex)) $data[$val]['team'] = $member[$teamIndex];
                if(!is_null($fnameIndex) && !is_null($lnameIndex) && is_null($nameIndex)) {
                    $data[$val]['name'][] = $member[$fnameIndex].' '.$member[$lnameIndex];
                } else {
                    $data[$val]['name'][] = $member[$nameIndex];
                }
                $data[$val]['position'][] = $member[$posIndex];
                if(!is_null($numIndex)) $data[$val]['number'][] = $member[$numIndex];
                $data[$val]['rating'][] = $member[$ratIndex];

                $i += 1;
            }
        }

        foreach($teams as $team) {
            for($i = 0; $i < count($data[$team]['name']); $i++) {
                $is_team = array_key_exists('team', $data[$team]);
                $is_num = array_key_exists('number', $data[$team]);
                if($is_team && $is_num) {
                    // 例)【49ers】 No.7 QB : Colin Kaepernick - 89
                    dump(' 【'.$data[$team]['team'].'】 No.'.$data[$team]['number'][$i].' '.$data[$team]['position'][$i].' : '.$data[$team]['name'][$i].' - '.$data[$team]['rating'][$i]);
                } else if ($is_team && !$is_num) {
                    // 例)【49ers】 QB : Colin Kaepernick - 89
                    dump(' 【'.$data[$team]['team'].'】 '.$data[$team]['position'][$i].' : '.$data[$team]['name'][$i].' - '.$data[$team]['rating'][$i]);
                } else if (!$is_team && $is_num) {
                    // 例)No.7 QB : Colin Kaepernick - 89
                    dump('No.'.$data[$team]['number'][$i].' '.$data[$team]['position'][$i].' : '.$data[$team]['name'][$i].' - '.$data[$team]['rating'][$i]);
                } else {
                    // 例)QB : Colin Kaepernick - 89
                    dump($data[$team]['position'][$i].' : '.$data[$team]['name'][$i].' - '.$data[$team]['rating'][$i]);
                }
            }
        }
    }
}
