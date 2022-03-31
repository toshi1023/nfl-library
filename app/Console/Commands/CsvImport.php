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
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $season = 2013;
        $teams = config('const.UrlTeams');

        $data = [];
        foreach($teams as $val) {
            // SplFileObjectの作成
            $file = new \SplFileObject(storage_path('app/public/'.$season.'/'.$val.'_madden_nfl_'.config('const.Madden.'.strval($season)).'.csv'));

            // 読み込み設定
            $file->setFlags(
                \SplFileObject::READ_CSV |      // CSVを配列形式で読み込む
                \SplFileObject::READ_AHEAD |
                \SplFileObject::SKIP_EMPTY |    // 前の行と合わせて、空行があったら読み飛ばす
                \SplFileObject::DROP_NEW_LINE   // 改行コードは無視する
            );
            // 1行ずつ読み込んで配列に保存
            foreach($file as $member){
                // $members[] = $member;
                // dump($member[0]);
                // dump($member[1]);
                // dump($member[2]);
                // dump($member[3]);
                // dump($member[4]);
                // dump($member[5]);
                $data[$val]['team'] = $member[0];
                $data[$val]['name'][] = $member[1].' '.$member[2];
                $data[$val]['position'][] = $member[3];
                $data[$val]['number'][] = $member[4];
                $data[$val]['rating'][] = $member[5];
            }
        }

        foreach($teams as $team) {
            for($i = 0; $i < count($data[$team]['name']); $i++) {
                // 例)【49ers】 No.7 QB : Colin Kaepernick - 89
                dump(' 【'.$data[$team]['team'].'】 No.'.$data[$team]['number'][$i].' '.$data[$team]['position'][$i].' : '.$data[$team]['name'][$i].' - '.$data[$team]['rating'][$i]);
            }
        }
    }
}
