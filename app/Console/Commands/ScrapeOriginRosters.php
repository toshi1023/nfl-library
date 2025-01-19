<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Chrome\ChromeDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverExpectedCondition;
use Facebook\WebDriver\WebDriverBy;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\OriginRoster;
use Exception;

class ScrapeOriginRosters extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:origin-rosters {season?} {teamId?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'scrapping all nfl origin rosters';

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

            // 変数設定
            $season = config('const.Season');
            $team_id = 1;
            if(!is_null($this->argument('season'))) $season = $this->argument('season');
            if(!is_null($this->argument('teamId'))) $team_id = $this->argument('teamId');
            $urlteams = config('const.UrlTeams');
            $skipIndex = $team_id - 1;

            if($season < 2012) throw new Exception('The value is invalid. Please set the value above 2012.');
    
            // webdriveの設定
            // $driverPath = realpath("/usr/local/bin/chromedriver");
            // putenv("webdriver.chrome.driver=" . $driverPath);
    
            // chrome option
            $options = new ChromeOptions();
            $options->addArguments([
                'disable-infobars',
                '--headless',
                '--no-sandbox',
                'start-maximized',
                'window-size=1920,1600',
            ]);
    
            $capabilitites = DesiredCapabilities::chrome();
            $capabilitites->setCapability(ChromeOptions::CAPABILITY, $options);
            // $driver = ChromeDriver::start($capabilitites);
            $capabilitites->setPlatform("LINUX");

            $host = 'http://172.18.0.4:4444/wd/hub';

            $driver = retry(3, function () use ($host, $capabilitites) {
                // chrome ドライバーの起動
                return RemoteWebDriver::create($host, $capabilitites, 20000, 20000);
            }, 1000);
            // $driver = RemoteWebDriver::create($host, $capabilitites, 5000, 5000);
            foreach($urlteams as $index => $val) {
                // 指定したチームIDまでスキップ
                if($index < $skipIndex) continue;
                $this->line('start scraping target '.$val.'...');
                // スクレイピングの設定
                $driver->get('https://www.pro-football-reference.com/teams/'.$val.'/'.$season.'_roster.htm');
                // 表示されるまで待つ
                $driver->wait(1)->until(
                    WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::cssSelector('.is_setup #roster'))
                );
    
                // rosterの選手名/ポジション/生年月日を取得
                $lastnamelist = [];
                $firstnamelist = [];
                $positions = [];
                $numbers = [];
                $birthdaylist = [];
                $weightlist = [];
                $heightlist = [];
                $collegelist = [];
                $explist = [];
                $draft_teamlist = [];
                $draft_roundlist = [];
                $draft_ranklist = [];
                $draft_yearlist = [];
                $elements = $driver->findElements(WebDriverBy::cssSelector('.is_setup #roster tbody td'));
                foreach($elements as $el) {
                    // 選手名
                    if(!is_null($el->getAttribute('data-stat')) && $el->getAttribute('data-stat') === 'player' && !is_null($el->getAttribute('csk'))) {
                        $lastnamelist[] = explode(',', $el->getAttribute('csk'))[0];
                        $firstnamelist[] = explode(',', $el->getAttribute('csk'))[1];
                    }
                    // ポジション
                    if(!is_null($el->getAttribute('data-stat')) && $el->getAttribute('data-stat') === 'pos'){
                        $positions[] = $el->getText();
                    }
                    // 生年月日
                    if(!is_null($el->getAttribute('data-stat')) && $el->getAttribute('data-stat') === 'birth_date_mod' && !is_null($el->getAttribute('csk'))){
                        $birthdaylist[] = explode('-', $el->getAttribute('csk'))[0].explode('-', $el->getAttribute('csk'))[1].explode('-', $el->getAttribute('csk'))[2];
                    }
                    // 体重
                    if(!is_null($el->getAttribute('data-stat')) && $el->getAttribute('data-stat') === 'weight'){
                        $weightlist[] = $el->getText();
                    }
                    // 身長
                    if(!is_null($el->getAttribute('data-stat')) && $el->getAttribute('data-stat') === 'height'){
                        $heightlist[] = $el->getText();
                    }
                    // 大学
                    if(!is_null($el->getAttribute('data-stat')) && $el->getAttribute('data-stat') === 'college_id'){
                        $college_el = $el->findElements(WebDriverBy::xpath('.//a'));  // $elの直下要素である<a>タグを取得(値が無い場合はnullが返る)
                        if(!is_null($college_el) && $college_el) {
                            $collegelist[] = $el->findElement(WebDriverBy::xpath('.//a'))->getText();
                        } else {
                            $collegelist[] = null;
                        }
                    }
                    // 経験年数
                    if(!is_null($el->getAttribute('data-stat')) && $el->getAttribute('data-stat') === 'experience'){
                        // ルーキーの場合は"0"を代入
                        if($el->getText() === 'Rook') {
                            $explist[] = '0';
                        } else {
                            $explist[] = $el->getText();
                        }
                    }
                    // ドラフト情報
                    if(!is_null($el->getAttribute('data-stat')) && $el->getAttribute('data-stat') === 'draft_info'){
                        if(is_null($el->getText()) || empty($el->getText())) {
                            $draft_teamlist[] = null;
                            $draft_roundlist[] = null;
                            $draft_ranklist[] = null;
                            $draft_yearlist[] = null;
                        } else {
                            $year_el = $el->findElement(WebDriverBy::xpath('.//a'));
                            $draft_teamlist[] = explode(' / ', $el->getText())[0];
                            $draft_roundlist[] = explode(' / ', $el->getText())[1];
                            $draft_ranklist[] = explode(' / ', $el->getText())[2];
                            $draft_yearlist[] = substr($year_el->getText(), 0, 4);  // 年数だけを取得する
                        }
                    }
                }
                // 背番号取得
                $elements = $driver->findElements(WebDriverBy::cssSelector('.is_setup #roster tbody th'));
                foreach($elements as $el) {
                    // 背番号
                    if(!is_null($el->getAttribute('data-stat')) && $el->getAttribute('data-stat') === 'uniform_number' && $el->getText() !== 'No.'){
                        $numbers[] = $el->getText();
                    }
                }

                // データ作成
                for($i = 0; $i < count($positions); $i++) {
                    // 身長と体重を日本式に変換
                    $weight = null;
                    $height = null;
                    if(!empty($weightlist[$i])) $weight = round($weightlist[$i] * config('const.Calc.Weight'), 1);
                    if(!empty($heightlist[$i])) $height = round((explode('-', $heightlist[$i])[0] * config('const.Calc.Feet')) + (explode('-', $heightlist[$i])[1] * config('const.Calc.Inch')), 1);
                    
                    // 空データの対処
                    if(empty($positions[$i])) $positions[$i] = 'No Data';
                    if(empty($numbers[$i])) $numbers[$i] = null;

                    // playersデータを作成
                    $data = [
                        'season'        => $season,
                        'team_id'       => $team_id,
                        'firstname'     => $firstnamelist[$i],
                        'lastname'      => $lastnamelist[$i],
                        'birthday'      => $birthdaylist[$i],
                        'weight'        => $weight,
                        'height'        => $height,
                        'college'       => $collegelist[$i],
                        'drafted_team'  => $draft_teamlist[$i],
                        'drafted_round' => $draft_roundlist[$i],
                        'drafted_rank'  => $draft_ranklist[$i],
                        'drafted_year'  => $draft_yearlist[$i],
                        'position_name' => $positions[$i],
                        'number'        => $numbers[$i],
                        'experience'    => $explist[$i]
                    ];

                    $originRosterModel = OriginRoster::where('season', $season)->where('team_id', $team_id)
                    ->where('firstname', $firstnamelist[$i])->where('lastname', $lastnamelist[$i])
                    ->where('birthday', $birthdaylist[$i])->first();
                    if($originRosterModel) {
                        $this->warn('update 【'.$val.'】'.$positions[$i].' : '.$firstnamelist[$i].' '.$lastnamelist[$i].' , '.$birthdaylist[$i].' [draft] team: '.$draft_teamlist[$i].', year: '.$draft_yearlist[$i]);
                    } else {
                        $this->info('create 【'.$val.'】'.$positions[$i].' : '.$firstnamelist[$i].' '.$lastnamelist[$i].' , '.$birthdaylist[$i].' [draft] team: '.$draft_teamlist[$i].', year: '.$draft_yearlist[$i]);
                        $originRosterModel = new OriginRoster();
                    }
                    $originRosterModel->fill($data)->save();
                }

                // team_idを更新
                $team_id += 1;
            }

            // ブラウザを閉じる
            $driver->quit();

            $this->info('');
            $this->info('Scrape Rosters All Successfully.');
        } catch(Exception $e) {
            Log::error($e->getMessage());
            // stack traceをLogに出力
            // $index = 1;
            // foreach($e->getTrace() as $val) {
            //     // 例) StackTrace[1] :: /home/test/app/Http/Controllers/TestController.php 22行目, { class: Test , function: test }
            //     $trace = 'StackTrace['.$index.'] :: '.$val["file"].' '.$val["line"].'行目 , { class: '.$val["class"].' , function: '.$val["function"].' }';
            //     Log::error($trace);
    
            //     $index += 1;
            // }
            Log::error($e);

            $this->info('');
            $this->error($e->getMessage());
            if(isset($driver)) $driver->quit();
        } finally {
            if(isset($driver)) $driver->quit();
        }
    }
}
