<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FoulRule;

class FoulRulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** 
         *  Offence Category
         **/

        // Delay Of Game
        FoulRule::create([
            'english_name'      => 'Delay Of Game',
            'japanese_name'     => 'ゲームの遅延',
            'description'       => '審判がレディー・フォー・プレーを宣告してから設定されていた40秒また25秒以内にプレーを開始しなかった。またタイムアウトの権利が残っていないのにタイムアウトを要求したこと。',
            'status_type'       => config('const.FoulRules.offence'),
            'yard_info'         => 5,
            'lossofdown_flg'    => false,
            'af_flg'            => false,
            'clock_flg'         => false,
            'exit_flg'          => false,
        ]);
        // False Start
        FoulRule::create([
            'english_name'      => 'False Start',
            'japanese_name'     => 'フォルス・スタート',
            'description'       => 'ボールがスナップされる前に、攻撃側の選手が攻撃と勘違いされるような動きをすること。',
            'status_type'       => config('const.FoulRules.offence'),
            'yard_info'         => 5,
            'lossofdown_flg'    => false,
            'af_flg'            => false,
            'clock_flg'         => false,
            'exit_flg'          => false,
        ]);
        // Illegal Motion
        FoulRule::create([
            'english_name'      => 'Illegal Motion',
            'japanese_name'     => 'イリーガル・モーション',
            'description'       => '攻撃側は、1人だけスナップ直前でも動いていることが許される。ただし、次の3つのルールを守る必要があり、満たしていない場合はイリーガル・モーション。①: 攻撃側の選手全員が、1秒以上静止したのちに動くこと。②: 動く選手はバックの選手であること。③: 相手ゴールライン方向（前方）へ動かないこと。',
            'status_type'       => config('const.FoulRules.offence'),
            'yard_info'         => 5,
            'lossofdown_flg'    => false,
            'af_flg'            => false,
            'clock_flg'         => false,
            'exit_flg'          => false,
        ]);
        // Illegal Shift
        FoulRule::create([
            'english_name'      => 'Illegal Shift',
            'japanese_name'     => 'イリーガル・シフト',
            'description'       => '攻撃側は、2人以上の選手が動いたり、1人以上が前方に動作したりして、ポジションや姿勢を変更することが許される。ただし、その変更後、全員が1秒以上静止する必要がある。静止しないままスナップした場合、イリーガル・シフトとなる。',
            'status_type'       => config('const.FoulRules.offence'),
            'yard_info'         => 5,
            'lossofdown_flg'    => false,
            'af_flg'            => false,
            'clock_flg'         => false,
            'exit_flg'          => false,
        ]);
        // Illegal Formation
        FoulRule::create([
            'english_name'      => 'Illegal Formation',
            'japanese_name'     => 'イリーガル・フォーメーション',
            'description'       => '
                攻撃側はスナップするとき、特定の位置に選手がいる必要があったり、逆にいてはならなかったり、フォーメーションに関するルールがある。このルールに反するとイリーガル・フォーメーション。
                具体的には次の3点が当てはまる。①: スクリメージラインから1ヤード以内の選手（ライン上の選手）が7人以上いること。②: NFLでは、ラインの内側が無資格番号(50-79)の選手であること。③: NFLでは、ラインの両端やバックが有資格番号(1-49、80-89)の選手であること。
            ',
            'status_type'       => config('const.FoulRules.offence'),
            'yard_info'         => 5,
            'lossofdown_flg'    => false,
            'af_flg'            => false,
            'clock_flg'         => false,
            'exit_flg'          => false,
        ]);
        // Illegal Substitution
        FoulRule::create([
            'english_name'      => 'Illegal Substitution',
            'japanese_name'     => '交代違反',
            'description'       => '12人以上の選手がハドルしたり、フォーメーションについたりすること。',
            'status_type'       => config('const.FoulRules.offence'),
            'yard_info'         => 5,
            'lossofdown_flg'    => false,
            'af_flg'            => false,
            'clock_flg'         => false,
            'exit_flg'          => false,
        ]);
        // Ineligible Receiver Downfield on Pass
        FoulRule::create([
            'english_name'      => 'Ineligible Receiver Downfield on Pass',
            'japanese_name'     => '無資格レシーバーのダウンフィールドへの侵入',
            'description'       => '
                パスプレーで、番号による無資格選手またはポジションによる無資格の選手（主にオフェンスラインの選手）が、パスが投げられる前にスクリメージラインより3ヤード以上（NFLでは1ヤード以上）前に出ること。
                QBをプロテクションする(守る)はずのラインの選手が前にでるとランプレーであると勘違いし、守備側が不利になってしまうため、反則として扱われる。
            ',
            'status_type'       => config('const.FoulRules.offence'),
            'yard_info'         => 5,
            'lossofdown_flg'    => false,
            'af_flg'            => false,
            'clock_flg'         => false,
            'exit_flg'          => false,
        ]);
        // Illegal Forward Pass
        FoulRule::create([
            'english_name'      => 'Illegal Forward Pass',
            'japanese_name'     => '不正なフォワードパス',
            'description'       => 'ボールキャリアがスクリメージラインを超えてから前方にパスした。または1回のプレーで2回以上前方にパスした。',
            'status_type'       => config('const.FoulRules.offence'),
            'yard_info'         => 5,
            'lossofdown_flg'    => true,
            'af_flg'            => false,
            'clock_flg'         => false,
            'exit_flg'          => false,
        ]);
        // Pass Interference
        FoulRule::create([
            'english_name'      => 'Pass Interference',
            'japanese_name'     => 'パス・インターフェース',
            'description'       => '
                攻撃選手による守備選手へのパス・キャッチの妨害をすること。具体的には次の2点が当てはまる。
                ①: 守備選手を押すなど、ランプレーのためのブロックと勘違いさせる行為をした後に、パスコースにでて、その後パスが投げられたなど（※パスの方向は無関係でも当てはまる）。
                ②: パスカバーしている守備選手を押して間合いを取って、パスキャッチを試みるなど、守備選手のボールをキャッチする機会を妨害すること。
            ',
            'status_type'       => config('const.FoulRules.offence'),
            'yard_info'         => 10,
            'lossofdown_flg'    => false,
            'af_flg'            => false,
            'clock_flg'         => false,
            'exit_flg'          => false,
        ]);
        // Intentional Grounding
        FoulRule::create([
            'english_name'      => 'Intentional Grounding',
            'japanese_name'     => 'インテンショナル・グラウンディング',
            'description'       => 'ロスを逃れるため、有資格レシーバーがいない地域に 故意にパスを投げること。',
            'status_type'       => config('const.FoulRules.offence'),
            'yard_info'         => 10,
            'lossofdown_flg'    => true,
            'af_flg'            => false,
            'clock_flg'         => false,
            'exit_flg'          => false,
        ]);
        // Holding
        FoulRule::create([
            'english_name'      => 'Holding',
            'japanese_name'     => 'ホールディング',
            'description'       => 'パス・プロテクションやラン・ブロックで、相手の腕や足など身体やジャージを掴んだり、相手に巻き付いたりすること。',
            'status_type'       => config('const.FoulRules.offence'),
            'yard_info'         => 10,
            'lossofdown_flg'    => false,
            'af_flg'            => false,
            'clock_flg'         => false,
            'exit_flg'          => false,
        ]);
        // Clipping
        FoulRule::create([
            'english_name'      => 'Clipping',
            'japanese_name'     => 'クリッピング',
            'description'       => '
                最初の接触が背後で、かつ、腰を含めて腰から下へのブロックすること。
                ただし、スナップしたときに決められた領域にいた選手が、その領域内でのブロックについては、膝を含めて膝から下へのブロックでなければ、反則ではない。
                ※NFLでは、クローズライン・プレー(Close-line Play)と呼び、両タックルの間で、スクリメージライン前後3ヤードの長方形の領域がそこに当てはまる。
            ',
            'status_type'       => config('const.FoulRules.offence'),
            'yard_info'         => 15,
            'lossofdown_flg'    => false,
            'af_flg'            => false,
            'clock_flg'         => false,
            'exit_flg'          => false,
        ]);
        // Block In the Back
        FoulRule::create([
            'english_name'      => 'Block In the Back',
            'japanese_name'     => '背後のブロック',
            'description'       => '
                相手を背後から腰から上に接触してブロックすること。
                ただし、クリッピングと同様の領域でのブロックは反則ではない。また、明らかにブロックしようとしてから、相手選手が背中を向けたときも反則にならない。
            ',
            'status_type'       => config('const.FoulRules.offence'),
            'yard_info'         => 10,
            'lossofdown_flg'    => false,
            'af_flg'            => false,
            'clock_flg'         => false,
            'exit_flg'          => false,
        ]);
        // Chop Block
        FoulRule::create([
            'english_name'      => 'Chop Block',
            'japanese_name'     => 'チョップ・ブロック',
            'description'       => '2人の攻撃選手が1人の守備選手に対して、片方がロー、他方がハイの組み合わせによるブロックをすること。',
            'status_type'       => config('const.FoulRules.offence'),
            'yard_info'         => 15,
            'lossofdown_flg'    => false,
            'af_flg'            => false,
            'clock_flg'         => false,
            'exit_flg'          => false,
        ]);
        // Tripping
        FoulRule::create([
            'english_name'      => 'Tripping',
            'japanese_name'     => 'トリッピング',
            'description'       => '足または脚を使って相手選手へブロックすること。',
            'status_type'       => config('const.FoulRules.offence'),
            'yard_info'         => 15,
            'lossofdown_flg'    => false,
            'af_flg'            => false,
            'clock_flg'         => false,
            'exit_flg'          => false,
        ]);


        /** 
         *  Defence Category
         **/

        // 
        FoulRule::create([
            'english_name'      => '',
            'japanese_name'     => '',
            'description'       => '',
            'status_type'       => config('const.FoulRules.defence'),
            'yard_info'         => 5,
            'lossofdown_flg'    => false,
            'af_flg'            => false,
            'clock_flg'         => false,
            'exit_flg'          => false,
        ]);


        /** 
         *  Kick Category
         **/

        // 
        FoulRule::create([
            'english_name'      => '',
            'japanese_name'     => '',
            'description'       => '',
            'status_type'       => config('const.FoulRules.kick'),
            'yard_info'         => 5,
            'lossofdown_flg'    => false,
            'af_flg'            => false,
            'clock_flg'         => false,
            'exit_flg'          => false,
        ]);
    }
}
