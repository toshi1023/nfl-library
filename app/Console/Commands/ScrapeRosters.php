<?php

namespace App\Console\Commands;

require_once 'vendor/autoload.php';

use Illuminate\Console\Command;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Chrome\ChromeDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverExpectedCondition;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverWindow;
use Facebook\WebDriver\WebDriverPoint;
use Facebook\WebDriver\Interactions\WebDriverActions;
use Facebook\WebDriver\WebDriverDimension;
use App\Models\Player;

class ScrapeRosters extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:rosters';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'scrapping nfl rosters';

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
     * NFLのロスター情報を指定したwebページからスクレイピングする
     *
     * @return int
     */
    public function handle()
    {
        try {

            // 変数設定
            $season = 2020;
            $teams = config('const.UrlTeams');
            $data = [];
            $player = new Player();
    
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
    
            // // スクレイピングの設定
            // $driver->get('https://www.pro-football-reference.com/teams/sfo/2013_roster.htm');
            // // 表示されるまで待つ
            // $driver->wait(1)->until(
            //     WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::cssSelector('.is_setup #roster'))
            // );
    
            // // rosterの選手名/ポジション/生年月日を取得
            // $lastnamelist = [];
            // $firstnamelist = [];
            // $positions = [];
            // $birthdaylist = [];
            // $elements = $driver->findElements(WebDriverBy::cssSelector('.is_setup #roster tbody td'));
            // foreach($elements as $el) {
            //     // 選手名
            //     if(!is_null($el->getAttribute('data-stat')) && $el->getAttribute('data-stat') === 'player' && !is_null($el->getAttribute('csk'))) {
            //         $lastnamelist[] = explode(',', $el->getAttribute('csk'))[0];
            //         $firstnamelist[] = explode(',', $el->getAttribute('csk'))[1];
            //     }
            //     // ポジション
            //     if(!is_null($el->getAttribute('data-stat')) && $el->getAttribute('data-stat') === 'pos'){
            //         $positions[] = $el->getText();
            //     }
            //     // 生年月日
            //     if(!is_null($el->getAttribute('data-stat')) && $el->getAttribute('data-stat') === 'birth_date_mod' && !is_null($el->getAttribute('csk'))){
            //         $birthdaylist[] = explode('-', $el->getAttribute('csk'))[0].explode('-', $el->getAttribute('csk'))[1].explode('-', $el->getAttribute('csk'))[2];
            //     }
            // }
    
            // for($i = 0; $i < count($positions); $i++) {
            //     $exist = $player->where('firstname', $firstnamelist[$i])->where('lastname', $lastnamelist[$i])->where('birthday', $birthdaylist[$i])->exists();
            //     if(!$exist) {
            //         Player::create([
            //             'firstname' => $firstnamelist[$i],
            //             'lastname'  => $lastnamelist[$i],
            //             'birthday'  => $birthdaylist[$i]
            //         ]);
            //         dump($positions[$i].' : '.$firstnamelist[$i].' '.$lastnamelist[$i].' , '.$birthdaylist[$i]);
            //     }
            // }
    
            // // フォームに文字列を入力して検索実行
            // $element = $driver->findElement(WebDriverBy::name('q'))
            //     ->sendKeys('うっかりさん　困った時の備忘録')
            //     ->submit();
    
            // // 表示されるまで待つ
            // $driver->wait(3)->until(WebDriverExpectedCondition::titleContains('うっかりさん'));
    
            // キャプチャをとる
            // $file = __DIR__."/sample.png";
            // $driver->takeScreenshot($file);
    
            // // ブラウザを閉じる
            // $driver->quit();
    
            foreach($teams as $val) {
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

                for($i = 0; $i < count($positions); $i++) {
                    $exist = $player->where('firstname', $firstnamelist[$i])->where('lastname', $lastnamelist[$i])->where('birthday', $birthdaylist[$i])->exists();
                    if(!$exist) {
                        Player::create([
                            'firstname' => $firstnamelist[$i],
                            'lastname'  => $lastnamelist[$i],
                            'birthday'  => $birthdaylist[$i]
                        ]);
                        dump($positions[$i].' : '.$firstnamelist[$i].' '.$lastnamelist[$i].' , '.$birthdaylist[$i]);
                    }
                }
    
                // foreach($firstnamelist as $val) {
                //     dump($val);
                // }
    
                // rosterの生年月日を取得
                // $crawler->filter('#roster td')->each(function($node) use (&$birthdaylist) {
                //     if(!is_null($node->attr('data-stat')) && $node->attr('data-stat') === 'birth_date_mod'){
                //        $birthdaylist[] = $node->attr('csk');
                //     }
                // });
    
                // foreach($firstnamelist as $name) {
                //     dump($val.' : '.$name);
                // }
                
                // $data[$val]['position'] = $positions;
                // $data[$val]['firstname'] = $firstnamelist;
                // $data[$val]['lastname'] = $lastnamelist;
                // $data[$val]['birthday'] = $birthdaylist;
            }

            // ブラウザを閉じる
            $driver->quit();
    
            // foreach($teams as $team) {
            //     // for($i = 0; $i < count($data[$team]['firstname']); $i++) {
            //     //     // 例) sfo : FB , Kyle Juszczyk
            //     //     dump($team.' : '.$data[$team]['position'][$i].' , '.$data[$team]['firstname'][$i].' '.$data[$team]['lastname'][$i].' , '.$data[$team]['birthday'][$i]);
            //     // }
            //     foreach($data[$team]['firstname'] as $val) {
            //         dump($val);
            //     }
            // }
        } catch(Exception $e) {
            dump($e->getMessage());
            $driver->quit();
        } finally {
            $driver->quit();
        }
    }
}
