<?php

return [
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
        'QB' => 1, 'RB' => 2, 'WR' => 3, 'TE' => 4, 'RG' => 5, 'LG' => 6, 'ROT' => 7, 'LOT' => 8, 'C' => 9,                             // Offence Category
        'RDT' => 10, 'LDT' => 11, 'NT' => 12, 'RDE' => 13, 'LDE' => 14, 'MLB' => 15, 'RLB' => 16, 'LLB' => 17,                          // Deffece Category
        'RCB' => 18, 'LCB' => 19, 'SS' => 20, 'FS' => 21,                                                                               // Deffece Category
        'K' => 22, 'P' => 23, 'LS' => 24,                                                                                               // Special Category
        'NOTHING' => 99
    ]
];