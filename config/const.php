<?php

return [
    // batch実行のseasonを指定
    'Season' => 2020,

    // 身長・体重計算値
    'Calc' => [
        'Weight' => 0.45,
        'Feet'   => 30.48,
        'Inch'   => 2.54
    ],
    // rosterのスクレイプ先URLの設定で使用する定数
    'UrlTeams' => [
        'buf', 'nwe', 'mia', 'nyj',  // AFC東地区
        'cin', 'pit', 'cle', 'rav',  // AFC北地区
        'oti', 'clt', 'htx', 'jax',  // AFC南地区
        'kan', 'rai', 'sdg', 'den',  // AFC西地区
        'dal', 'phi', 'was', 'nyg',  // NFC東地区
        'gnb', 'min', 'chi', 'det',  // NFC北地区
        'tam', 'nor', 'atl', 'car',  // NFC南地区
        'ram', 'crd', 'sfo', 'sea',  // NFC西地区
    ],
    // teamsテーブルの拠点名称
    'City' => [
        'Buffalo', 'New England', 'Miami', 'New York',          // AFC東地区
        'Cincinnati', 'Pittsburgh', 'Cleveland', 'Baltimore',   // AFC北地区
        'Tennessee', 'Indianapolis', 'Houston', 'Jacksonville', // AFC南地区
        'Kansas City', 'Las Vegas', 'Los Angeles', 'Denver',    // AFC西地区
        'Dallas', 'Philadelphia', 'Washington', 'New York',     // NFC東地区
        'Green Bay', 'Minnesota', 'Chicago', 'Detroit',         // NFC北地区
        'Tampa Bay', 'New Orleans', 'Atlanta', 'Carolina',      // NFC南地区
        'Los Angeles', 'Arizona', 'San Francisco', 'Seattle',   // NFC西地区
    ],
    // teamsテーブルのチーム名称
    'TeamName' => [
        'Bills', 'Patriots', 'Dolphins', 'Jets',        // AFC東地区
        'Bengals', 'Steelers', 'Browns', 'Ravens',      // AFC北地区
        'Titans', 'Colts', 'Texans', 'Jaguars',         // AFC南地区
        'Chiefs', 'Raiders', 'Chargers', 'Broncos',     // AFC西地区
        'Cowboys', 'Eagles', 'Commanders', 'Giants',    // NFC東地区
        'Packers', 'Vikings', 'Bears', 'Lions',         // NFC北地区
        'Buccaneers', 'Saints', 'Falcons', 'Panthers',  // NFC南地区
        'Rams', 'Cardinals', '49ers', 'Seahawks',       // NFC西地区
    ],
    // positionsテーブルのカテゴリ
    'Category' => [
        'QB' => 1, 'HB' => 2, 'FB' => 3, 'WR' => 4, 'TE' => 5, 'RG' => 6, 'LG' => 7, 'ROT' => 8, 'LOT' => 9, 'C' => 10,                 // Offence Category
        'RDT' => 11, 'LDT' => 12, 'NT' => 13, 'RDE' => 14, 'LDE' => 15, 'MLB' => 16, 'RLB' => 17, 'LLB' => 18,                          // Deffece Category
        'RCB' => 19, 'LCB' => 20, 'SS' => 21, 'FS' => 22,                                                                               // Deffece Category
        'K' => 23, 'P' => 24, 'LS' => 25,                                                                                               // Special Category
        'NOTHING' => 99
    ],
    // positionsテーブルの抽象カテゴリ
    'AbstCate' => [
        'QB' => 1, 'RB' => 2, 'WR' => 3, 'TE' => 4, 'OL' => 5,          // Offence Category
        'DL' => 6, 'LB' => 7, 'DB' => 8,                                // Deffece Category
        'K' => 9, 'LS' => 10,                                           // Special Category
        'NOTHING' => 99
    ],
    // formationsテーブルのodflg
    'ODflg' => [
        'offence' => true,
        'defence' => false
    ],
    // formation_id
    'Formationid' => [
        'T' => 1, 'I' => 2, 'SSB' => 3, 'SF' => 4, 'PSFH' => 5, 'PSHH' => 6, 'SG' => 7, 'PF' => 8, 'WB' => 9, 
        'FBW4' => 10, 'FBWT' => 11, 'WT' => 12, 'EB' => 13, 'SW' => 14, 'WF' => 15, 
        '3-4' => 16, '4-3' => 17, '4-4' => 18, '5-2' => 19, 'Nickel_LCB' => 20, 'Nickel_RCB' => 21, 'Dime' => 22, '46' => 23,
        '1-6-4' => 24, '2-4-5' => 25, '3-7-1' => 26, '3-6-2' => 27, '4-6-1' => 28, '4-5-2' => 29, '5-5-1' => 30, 
        '5-4-2' => 31, '6-4-1' => 32, '6-3-2' => 33, '3-3-5' => 34,
        'SSB_TE' => 35, 'I_TE' => 36
    ],
    // Maddenのナンバリング紐づけ
    'Madden' => [
        '2012' => 13, '2013' => 25, '2014' => 15, '2015' => 16, '2016' => 17, 
        '2017' => 18, '2018' => 19, '2019' => 20, '2020' => 21, '2021' => 22
    ],

    // メールアドレス
    'RootMailAddress' => env('ROOT_MAIL_ADDRESS'),
    // パスワード
    'RootPassword'    => env('ROOT_PASSWORD'),

    // AWS S3バケット
    'Url'           => env('AWS_BUCKET_URL'),
    // AWS S3フォルダ
    'Player'        => 'Player',
    'Team'          => 'Team',
    'Logo'          => 'Logo',          // teamsのimage_file
    'Background'    => 'Background'     // teamsのback_image_file
];