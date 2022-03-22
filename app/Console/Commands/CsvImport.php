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
        // SplFileObjectの作成
        $file = new \SplFileObject(storage_path('app/public/san_francisco_49ers_madden_nfl_25.csv'));

        // 読み込み設定
        $file->setFlags(
            \SplFileObject::READ_CSV | // CSVを配列形式で読み込む
            \SplFileObject::READ_AHEAD |
            \SplFileObject::SKIP_EMPTY | // 前の行と合わせて、空行があったら読み飛ばす
            \SplFileObject::DROP_NEW_LINE // 改行コードは無視する
        );
        // 1行ずつ読み込んで配列に保存
        $members = [];
        foreach($file as $member){
            // $members[] = $member;
            dump($member[0]);
            dump($member[1]);
            dump($member[2]);
            dump($member[3]);
            dump($member[4]);
            dump($member[5]);
        }
    }
}
