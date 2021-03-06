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
         *  Offence Defence Common Category
         **/

        // Illegal Use Of Hand
        FoulRule::create([
            'english_name'      => 'Illegal Use Of Hand',
            'japanese_name'     => '不正な手の使用',
            'description'       => '相手選手を対するに当たり、手や腕の使い方のルールが決まっており、それに反する行為をすること。攻守共通してフェイスマスクを押す行為も含まれるが、ボールキャリアーに限り対象外となる。',
            'status_type'       => config('const.FoulRules.common'),
            'yard_info'         => 10,
            'lossofdown_flg'    => false,
            'af_flg'            => false,
            'clock_flg'         => false,
            'exit_flg'          => false,
        ]);
        // Personal Foul
        FoulRule::create([
            'english_name'      => 'Personal Foul',
            'japanese_name'     => 'パーソナル・ファウル',
            'description'       => '
                怪我を招く危険な行為は、故意でも偶然でも、パーソナル・ファウルと呼ばれる。守備側のパーソナル・ファウルの場合、攻撃側は自動的にファーストダウンが与えられる。
                また、危険度が高かったり、悪質と判断したりした場合は、反則を犯した選手を「資格没収（退場）」の処分が科される（相手チームの辞退、相殺を問わない）。
            ',
            'status_type'       => config('const.FoulRules.common'),
            'yard_info'         => 15,
            'lossofdown_flg'    => false,
            'af_flg'            => true,
            'clock_flg'         => false,
            'exit_flg'          => true,
        ]);
        // Facemask
        FoulRule::create([
            'english_name'      => 'Facemask',
            'japanese_name'     => 'フェイス・マスク',
            'description'       => 'フェイス・マスクを掴んで、引っ張ったり、捻ったりする行為。',
            'status_type'       => config('const.FoulRules.common'),
            'yard_info'         => 15,
            'lossofdown_flg'    => false,
            'af_flg'            => true,
            'clock_flg'         => false,
            'exit_flg'          => false,
        ]);
        // Unsportsmanlike Conduct
        FoulRule::create([
            'english_name'      => 'Unsportsmanlike Conduct',
            'japanese_name'     => 'スポーツマンらしからぬ行為',
            'description'       => '
                審判、相手選手、観客への暴言、侮蔑行為。特に悪質なものはトーンティング（taunting）とも呼ばれる。
                得点やビッグプレー後の過度のセレブレーション行為も対象である。
                守備側の選手によるものの場合は、攻撃側にファーストダウンが与えられる。
            ',
            'status_type'       => config('const.FoulRules.common'),
            'yard_info'         => 15,
            'lossofdown_flg'    => false,
            'af_flg'            => true,
            'clock_flg'         => false,
            'exit_flg'          => false,
        ]);


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
            'description'       => '
                攻撃側は、1人だけスナップ直前でも動いていることが許される。ただし、次の3つのルールを守る必要があり、満たしていない場合はイリーガル・モーション。
                (1) 攻撃側の選手全員が、1秒以上静止したのちに動くこと。
                (2) 動く選手はバックの選手であること。
                (3) 相手ゴールライン方向（前方）へ動かないこと。
            ',
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
            'japanese_name'     => '不正なフォーメーション',
            'description'       => '
                攻撃側はスナップするとき、特定の位置に選手がいる必要があったり、逆にいてはならなかったり、フォーメーションに関するルールがある。このルールに反するとイリーガル・フォーメーション。
                具体的には次の3点が当てはまる。
                (1) スクリメージラインから1ヤード以内の選手（ライン上の選手）が7人以上いること。
                (2) NFLでは、ラインの内側が無資格番号(50-79)の選手であること。
                (3) NFLでは、ラインの両端やバックが有資格番号(1-49、80-89)の選手であること。
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
                (1) 守備選手を押すなど、ランプレーのためのブロックと勘違いさせる行為をした後に、パスコースにでて、その後パスが投げられたなど（※パスの方向は無関係でも当てはまる）。
                (2) パスカバーしている守備選手を押して間合いを取って、パスキャッチを試みるなど、守備選手のボールをキャッチする機会を妨害すること。
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

        // Offside
        FoulRule::create([
            'english_name'      => 'Offside',
            'japanese_name'     => 'オフサイド',
            'description'       => '
                スナップ前に守備選手が不正な位置にいること。具体的には次の場合が該当する。
                (1) スナップしたときに守備選手がニュートラルゾーン内か、ニュートラルゾーンに越えた位置にいる。スナップ前に戻っていれば反則ではない。
                (2) スナップする前に守備選手が、ニュートラルゾーンを越えて攻撃選手に接触する。
                (3) スナップ前のボールを触る。
                (4) スナップ前に、相手選手に接触しなくても、バックに向かって突進する。
                (5) スナップ前に、オフェンスラインを脅して、反射的な動き（フォルス・スタート）を誘発する。
            ',
            'status_type'       => config('const.FoulRules.defence'),
            'yard_info'         => 5,
            'lossofdown_flg'    => false,
            'af_flg'            => false,
            'clock_flg'         => false,
            'exit_flg'          => false,
        ]);
        // Encroachment
        FoulRule::create([
            'english_name'      => 'Encroachment',
            'japanese_name'     => 'エンクローチメント',
            'description'       => 'スナップする前に守備選手が、ニュートラルゾーンを越えて攻撃選手に接触すること。',
            'status_type'       => config('const.FoulRules.defence'),
            'yard_info'         => 5,
            'lossofdown_flg'    => false,
            'af_flg'            => false,
            'clock_flg'         => false,
            'exit_flg'          => false,
        ]);
        // Neutral Zone Infraction
        FoulRule::create([
            'english_name'      => 'Neutral Zone Infraction',
            'japanese_name'     => 'ニュートラルゾーン・インフラクション',
            'description'       => 'スナップする前に、ニュートラル・ゾーンに侵入し、攻撃選手の反射的な動き（フォルス・スタート）を誘発すること。',
            'status_type'       => config('const.FoulRules.defence'),
            'yard_info'         => 5,
            'lossofdown_flg'    => false,
            'af_flg'            => false,
            'clock_flg'         => false,
            'exit_flg'          => false,
        ]);
        // Pass Interference
        FoulRule::create([
            'english_name'      => 'Pass Interference',
            'japanese_name'     => 'パス・インターフェース',
            'description'       => '
                守備選手による攻撃選手へのパス・キャッチの妨害をすること。次のような場合、反則と判断されることが多い。
                (1) 自身はボールをキャッチする構えなく、キャッチ（インターセプト）しようとしている相手選手に接触した。
                (2) 自身はボールに向かわずボールを追いかけている相手選手の動き（走路）を邪魔するために接触した。
                (3) パスキャッチしようとしている攻撃選手の肩や胸などに片手で接触して、他方の手でパスをブロックした。
                これらの行為より前に、パスされたボールがタッチされている場合は、反則にならない。
                また妨害がなかったとしても、明らかにキャッチできなかったと判断できると場合は、反則にならない。
                NFLでは、距離に関係なく反則地点でファーストダウンが与えられる。
            ',
            'status_type'       => config('const.FoulRules.defence'),
            'yard_info'         => 20,
            'lossofdown_flg'    => false,
            'af_flg'            => true,
            'clock_flg'         => false,
            'exit_flg'          => false,
        ]);
        // Illegal Contact
        FoulRule::create([
            'english_name'      => 'Illegal Contact',
            'japanese_name'     => 'イリーガル・コンタクト',
            'description'       => '
                NFL独自のルール。スクリメージ・ラインから5ヤード以上越えた地点で攻撃側のレシーバーに接触すること。
                ボールがポケットから出た場合は、適用外となる。
                また、攻撃選手から接触を受けて、それに対して自身の身体を守るための接触は認められる。
            ',
            'status_type'       => config('const.FoulRules.defence'),
            'yard_info'         => 5,
            'lossofdown_flg'    => false,
            'af_flg'            => true,
            'clock_flg'         => false,
            'exit_flg'          => false,
        ]);
        // Holding
        FoulRule::create([
            'english_name'      => 'Holding',
            'japanese_name'     => 'ホールディング',
            'description'       => 'ボールを持っていない選手に対して、タックルしたり、つかんだり、その他妨害したりすること。',
            'status_type'       => config('const.FoulRules.defence'),
            'yard_info'         => 5,
            'lossofdown_flg'    => false,
            'af_flg'            => true,
            'clock_flg'         => false,
            'exit_flg'          => false,
        ]);
        // Roughing the Passer
        FoulRule::create([
            'english_name'      => 'Roughing the Passer',
            'japanese_name'     => 'ラフィング・ザ・パサー',
            'description'       => '明らかにパスを投げた後のパサー（クォーターバック）を突き当たったり、投げつけたりの乱暴行為をすること。',
            'status_type'       => config('const.FoulRules.defence'),
            'yard_info'         => 15,
            'lossofdown_flg'    => false,
            'af_flg'            => true,
            'clock_flg'         => false,
            'exit_flg'          => false,
        ]);
        // Horse Collar Tackle
        FoulRule::create([
            'english_name'      => 'Horse Collar Tackle',
            'japanese_name'     => 'ホースカラータックル',
            'description'       => 'ボールキャリアーの襟首を掴んだタックル。乗馬で手綱を引いて止めるような形からの命名であり、首や腰が大きく反ってしまい危険が伴うため、反則として扱われる。',
            'status_type'       => config('const.FoulRules.defence'),
            'yard_info'         => 15,
            'lossofdown_flg'    => false,
            'af_flg'            => false,
            'clock_flg'         => false,
            'exit_flg'          => false,
        ]);
        // Illegal Formation
        FoulRule::create([
            'english_name'      => 'Illegal Formation',
            'japanese_name'     => '不正なフォーメーション',
            'description'       => 'キックプレー時においてLOSの左右どちらかに6人以上が位置していること。',
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

        // Illegal Formation
        FoulRule::create([
            'english_name'      => 'Illegal Formation',
            'japanese_name'     => '不正なフォーメーション',
            'description'       => '
                フリーキック（キックオフ）をするチームは、次の2点を守らないといけない。
                (1) キッカー以外の選手はボールから5ヤード以内にいること。
                (2) キックしたとき、キッカーの両側にそれぞれ4人以上いること。
            ',
            'status_type'       => config('const.FoulRules.kick'),
            'yard_info'         => 5,
            'lossofdown_flg'    => false,
            'af_flg'            => false,
            'clock_flg'         => false,
            'exit_flg'          => false,
        ]);
        // Offside
        FoulRule::create([
            'english_name'      => 'Offside',
            'japanese_name'     => 'オフサイド',
            'description'       => 'フリーキック（キックオフ）をする前に、キッカー、ホルダー以外の選手がボールより前に出ること。',
            'status_type'       => config('const.FoulRules.kick'),
            'yard_info'         => 5,
            'lossofdown_flg'    => false,
            'af_flg'            => false,
            'clock_flg'         => false,
            'exit_flg'          => false,
        ]);
        // Kickoff Out of Bounds
        FoulRule::create([
            'english_name'      => 'Kickoff Out of Bounds',
            'japanese_name'     => 'フリーキックのアウト・オブ・バウンズ',
            'description'       => '
                フリーキック（キックオフ）されたボールが、レシーブ・チームの選手に触れることなく、ゴールラインより手前でサイドラインを割ること。
                パントキックではないキックオフのキックで、このペナルティが該当する。
                レシーブ・チーム陣40ヤードでファーストダウンが開始される。
            ',
            'status_type'       => config('const.FoulRules.kick'),
            'yard_info'         => 20,
            'lossofdown_flg'    => false,
            'af_flg'            => false,
            'clock_flg'         => false,
            'exit_flg'          => false,
        ]);
        // Illegal Touch
        FoulRule::create([
            'english_name'      => 'Illegal Touch',
            'japanese_name'     => '不正なタッチ',
            'description'       => '
                フリーキック（キックオフ）されたボールは、キックした位置から10ヤード進むか、レシーブ・チームの選手に触れるまで、キック・チームの選手が触れてはならない。
                触れた地点から5ヤードレシービングチーム側に下がって、レシーブ・チームのファーストダウン。
            ',
            'status_type'       => config('const.FoulRules.kick'),
            'yard_info'         => 5,
            'lossofdown_flg'    => false,
            'af_flg'            => false,
            'clock_flg'         => false,
            'exit_flg'          => false,
        ]);
        // Roughing the Kicker
        FoulRule::create([
            'english_name'      => 'Roughing the Kicker',
            'japanese_name'     => 'ラフィング・ザ・キッカー',
            'description'       => '
                明らかに蹴った後のキッカーやパンターに突き当たったり、投げつけたりの乱暴行為をすること。
                また、フィールドゴール・プレーのときホルダー(ボールをセットする人)に対しても同様の保護規定がある。
            ',
            'status_type'       => config('const.FoulRules.kick'),
            'yard_info'         => 15,
            'lossofdown_flg'    => false,
            'af_flg'            => true,
            'clock_flg'         => false,
            'exit_flg'          => false,
        ]);
        // Running Into the Kicker
        FoulRule::create([
            'english_name'      => 'Running Into the Kicker',
            'japanese_name'     => 'ランニング・イントゥ・ザ・キッカー',
            'description'       => '明らかに蹴った後のキッカーやパンターに対して、乱暴とは言えないほどの接触があった場合にコールされる。ラフィング・ザ・キッカーほどではないが、キッカーが蹴り上げた足先に触ったときなど、多少の危険が伴うため、反則として扱われる。',
            'status_type'       => config('const.FoulRules.kick'),
            'yard_info'         => 5,
            'lossofdown_flg'    => false,
            'af_flg'            => false,
            'clock_flg'         => false,
            'exit_flg'          => false,
        ]);
    }
}
