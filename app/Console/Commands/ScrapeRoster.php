<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Chrome\ChromeDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\WebDriverExpectedCondition;
use Facebook\WebDriver\WebDriverBy;
use Illuminate\Support\Facades\Log;
use App\Models\Player;
use App\Models\Position;
use App\Models\Roster;
use Exception;

class ScrapeRoster extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:roster {season?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'scrapping nfl roster';

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
     * NFLのロスター情報を指定したwebページから1つだけスクレイピングする
     * 使用するときは $team_id の値のみを変更する
     *
     * @return int
     */
    public function handle()
    {
        try {
            // 変数設定
            $season = config('const.Season');
            if(!is_null($this->argument('season'))) $season = $this->argument('season');

            $team_id = 32;
            $urlteam = config('const.UrlTeams')[$team_id - 1];

            if($season < 2012) throw new Exception('The value is invalid. Please set the value above 2012.');

            // Model設定
            $playerModel = new Player();
            $positionModel = new Position();

            // webdriveの設定
            $driverPath = realpath("/usr/local/bin/chromedriver");
            putenv("webdriver.chrome.driver=" . $driverPath);

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
            $driver = ChromeDriver::start($capabilitites);

            // スクレイピングの設定
            $driver->get('https://www.pro-football-reference.com/teams/'.$urlteam.'/'.$season.'_roster.htm');
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
            }
            // 背番号取得
            $elements = $driver->findElements(WebDriverBy::cssSelector('.is_setup #roster tbody th'));
            foreach($elements as $el) {
                // 背番号
                if(!is_null($el->getAttribute('data-stat')) && $el->getAttribute('data-stat') === 'uniform_number' && $el->getText() !== 'No.'){
                    $numbers[] = $el->getText();
                }
            }

            // playersテーブルとrostersテーブルのデータ作成
            for($i = 0; $i < count($positions); $i++) {
                $exist = $playerModel->where('firstname', $firstnamelist[$i])->where('lastname', $lastnamelist[$i])->where('birthday', $birthdaylist[$i])->first();
                if(is_null($exist)) {
                    // playersデータを作成
                    $exist = Player::create([
                        'firstname' => $firstnamelist[$i],
                        'lastname'  => $lastnamelist[$i],
                        'birthday'  => $birthdaylist[$i]
                    ]);

                    dump($positions[$i].' : '.$firstnamelist[$i].' '.$lastnamelist[$i].' , '.$birthdaylist[$i]);
                }
                // rostersデータを作成
                if(empty($positions[$i])) $positions[$i] = 'No Data';
                $position = $positionModel->where('name', $positions[$i])->first();
                if(is_null($position)) throw new Exception('position is not define. team: '.$urlteam.', position: '.$positions[$i]);
                if(empty($numbers[$i])) $numbers[$i] = null;

                Roster::create([
                    'season'        => $season,
                    'team_id'       => $team_id,
                    'player_id'     => $exist['id'],
                    'position_id'   => $position['id'],
                    'number'        => $numbers[$i]
                ]);
            }

            $this->info('');
            $this->info('Scrape Roster Successfully.');
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
            if(isset($driver)) $driver->quit();
        } finally {
            if(isset($driver)) $driver->quit();
        }
    }
}
